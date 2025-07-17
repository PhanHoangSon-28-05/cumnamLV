@extends('client.master')
@section('title', 'Categories')

@section('style')
    <style>

    </style>
@endsection

@section('content')

    <main id="content-wrapper" class="main-v2 text-body">
        <section class="container-fluid" catergory.htmlid="product-catergory" id="product-catergory">
            <div class="row content py-5c mb-3">
                <div class="col-md-3 col-12"></div>
                <div class="col-md-6 col-12 text-center py-5">

                    <p class="font-weight-bolder h3">Categories</p>

                </div>
                <div class="col-md-3 col-12"></div>
            </div>
            <div class="product">
                <div class="row">
                    @if (count($categories) == 0)
                        <div class="col-12">
                            <p class="text-center">There are currently no categories.</p>
                        </div>
                    @else
                        @foreach ($categories as $category)
                        <div class="col-12 col-md-6 col-lg-4 col-12 mb-4">
                            <div class="card">
                                <div class="position-relative">
                                    <img src="{{ route('storages.image', ['url' => $category->image]) }}" style="object-fit:cover"
                                        alt="{{ $category->name }}" height="350" width="100%">
                                </div>
                                <div class="card-body text-center product-info">
                                    <h5 class="card-title font-weight-bold">{{ $category->name }}</h5>
                                    <p class="card-text">{{ $category->description }}</p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ URL::route('home.category', $category->slug) }}" class="btn btn-dark">
                                        View all
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    </main>

@endsection

@push('script')
    <script>
        function setEqualHeight(elements) {
            var heights = elements.map(function() {return $(this).height();}).get();
            var max_height = Math.max.apply(null, heights);

            elements.height(max_height);
        }

        $(document).ready(function() {
            setEqualHeight($('.product .product-info'));
        });
    </script>
@endpush
