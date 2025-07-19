<!-- Modal -->

@push('style')
    <link rel="stylesheet" href="{{ URL::asset('view/style/css/review.css') }}">
@endpush
<div wire:ignore.self class="modal fade " id="reviewcontent" tabindex="-1" aria-labelledby="reviewcontentLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewcontentLabel">Reviews</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-4" id="review">

                @if ($shows->count() > 0)
                <div id="reviewCarousel" class="carousel slide" data-interval="false" data-wrap="false">
                    <div class="row">
                        <a class="col-auto d-md-flex align-items-center d-none" href="#reviewCarousel" role="button" data-slide="prev">
                            <i class="fa-solid fa-chevron-left fa-xl text-dark"></i>
                        </a>

                        <div class="col carousel-inner">
                            @foreach ($shows as $show)
                            <div class="container carousel-item {{ $loop->first ? 'active' : '' }}" wire:ignore.self>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <i class="fa-regular fa-circle-user fa-3x text-secondary"></i>
                                            </div>
                                            <div class="col">
                                                <strong>{{ $show->name }}</strong> <br>
                                                <small class="text-muted">{{ $show->email }}</small>
                                            </div>
                                            <div class="col-auto">
                                                <span class="stars">
                                                    @php($rating = $show->star)
                                                    @foreach(range(1,5) as $i)
                                                    <span class="fa-stack" style="width:1em">
                                                        <i class="far fa-star fa-stack-1x"></i>
        
                                                        @if($rating > 0)
                                                        <i class="fas fa-star fa-stack-1x"></i>
                                                        @endif
                                                        @php($rating--)
                                                    </span>
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <p>{{ $show->content }}</p>
                                            </div>
                                            @if (isset($show->images))
                                            <div class="col-12 mb-3">
                                                <div class="comment-images">
                                                    @foreach ($show->images as $image)
                                                    <img src="{{ route('storages.image', ['url' => $image->image]) }}" alt="">
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <a class="col-auto d-md-flex align-items-center d-none" href="#reviewCarousel" role="button" data-slide="next">
                            <i class="fa-solid fa-chevron-right fa-xl text-dark"></i>
                        </a>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col text-center">
                        <h1><strong>No Review</strong></h1>
                    </div>
                </div>
                @endif

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-outline-primary">Leave a Review</button> --}}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function() {
        $('#reviewCarousel').on('slid.bs.carousel', function(e) {
            let max_review = @this.get('max_review');
            let review_total = @this.get('review_total');

            if (e.to+1 < max_review || review_total == max_review) return;

            @this.call('getNextReview');
        });
    });
</script>
@endpush
