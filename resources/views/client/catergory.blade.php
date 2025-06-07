@extends('client.master')
@section('title', $cate->name ?? 'Products')

@section('content')

    <main id="content-wrapper" class="main-v2 text-body">
        <section class="container-fluid" catergory.htmlid="product-catergory" id="product-catergory">
            <div class="row content py-5c mb-3">
                <div class="col-md-3 col-12"></div>
                <div class="col-md-6 col-12 text-center py-5">
                    @isset($cate)
                    <p class="font-weight-bolder h3">{{ $cate->name }}</p>
                    <p class="">
                        @if ($cate->description)
                            {{ $cate->description }}
                            </br>
                        @else
                            The content is being updated.
                        @endif
                    </p>
                    @else
                    <p class="font-weight-bolder h3">Products</p>
                    @endisset

                </div>
                <div class="col-md-3 col-12"></div>
            </div>
            <div class="product">
                <div class="row">
                    @if (count($productcates) == 0)
                        <div class="col-12">
                            <p class="text-center">There are currently no products.</p>
                        </div>
                    @else
                        {{-- @dd($productcates) --}}
                        @foreach ($productcates as $product)
                        <div class="col-md-4 col-12 mb-4">
                            <div class="card">
                                <div class="position-relative">
                                    <img src="{{ route('storages.image', ['url' => $product->pic]) }}" style="object-fit:cover"
                                        alt="{{ $product->name }}" height="350" width="100%">
                                    <img src="{{ route('storages.image', ['url' => $logo->pic]) }}" alt="Logo"
                                        id="logo" class="logo" style="object-fit:cover">
                                    <div class="price-tag position-absolute">
                                        From ${{ $product->from }}
                                    </div>
                                </div>
                                <div class="card-body text-center product-info">
                                    <h5 class="card-title font-weight-bold">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ URL::route('home.products', $product->slug) }}" class="btn btn-dark">
                                        Customize Style
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    {{-- <div class="col-md-4 col-12 mb-2">
                        <div class="card">
                            <div class="position-relative">
                                <img src="{{ URL::asset('view/style/images/Zebra/Artboard 169@4x.jpg') }}"
                                    class="card-img-top img-fluid" alt="Light Filtering Zebra Shades">
                                <div class="price-tag position-absolute">
                                    From $272
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title font-weight-bold">Light Filtering Zebra Shades</h5>
                                <p class="card-text">Combine alternating sheer and solid fabric bands in a single Light
                                    Filtering Ze...</p>
                                <a href="#" class="btn btn-dark">Customize Style</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mb-2">
                        <div class="card">
                            <div class="position-relative">
                                <img src="{{ URL::asset('view/style/images/Zebra/Artboard 22@4x(1).jpg') }}"
                                    class="card-img-top img-fluid" alt="Light Filtering Zebra Shades">
                                <div class="price-tag position-absolute">
                                    From $272
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title font-weight-bold">Light Filtering Zebra Shades</h5>
                                <p class="card-text">Combine alternating sheer and solid fabric bands in a single Light
                                    Filtering Ze...</p>
                                <a href="#" class="btn btn-dark">Customize Style</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mb-2">
                        <div class="card">
                            <div class="position-relative">
                                <img src="{{ URL::asset('view/style/images/Zebra/Artboard 18@4x.jpg') }}"
                                    class="card-img-top img-fluid" alt="Light Filtering Zebra Shades">
                                <div class="price-tag position-absolute">
                                    From $272
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title font-weight-bold">Light Filtering Zebra Shades</h5>
                                <p class="card-text">Combine alternating sheer and solid fabric bands in a single Light
                                    Filtering Ze...</p>
                                <a href="#" class="btn btn-dark">Customize Style</a>
                            </div>
                        </div>
                    </div> --}}
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
