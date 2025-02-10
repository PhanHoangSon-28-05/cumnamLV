<!-- Modal -->

@push('style')
    <link rel="stylesheet" href="{{ URL::asset('view/style/css/review.css') }}">
@endpush
<div class="modal fade " id="reviewcontent" tabindex="-1" aria-labelledby="reviewcontentLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="reviewcontentLabel">Modal title</h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="review">
                @foreach ($shows as $show)
                    <div class="container mt-4">
                        <div class="comment-box">
                            <i class="fa-regular fa-circle-user comment-icon"></i>
                            <div class="comment-content">
                                <div class="comment-name">{{ $show->name }}</div>
                                {{-- @if ($show->star == 1)
                                    <div class="comment-stars">
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                @endif
                                @if ($show->star == 2)
                                    <div class="comment-stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                @endif
                                @if ($show->star == 3)
                                    <div class="comment-stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                @endif
                                @if ($show->star == 4)
                                    <div class="comment-stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                @endif
                                @if ($show->star == 5)
                                    <div class="comment-stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                @endif --}}
                                <p class="stars comment-stars" data-rating="{{ $show->star }}">
                                </p>
                                <div class="comment-text">
                                    {{ $show->content }}
                                </div>
                                <div class="comment-images">
                                    @if (isset($show->images))
                                        @foreach ($show->images as $image)
                                            {{-- <img src="{{ URL::asset('storage/'.$image->image) }}" alt="" width="100px"> --}}
                                            <img src="{{ route('storages.image', ['url' => $image->image]) }}"
                                                alt="">
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
