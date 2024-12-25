@extends('client.master')
@section('title', $cate->name)

@section('content')

    <main id="content-wrapper" class="main-v2 text-body">
        <section class="container-fluid" catergory.htmlid="product-catergory" id="product-catergory">
            <div class="row content py-5c mb-3">
                <div class="col-md-3 col-12"></div>
                <div class="col-md-6 col-12 text-center py-5">
                    <p class="font-weight-bolder h3">{{ $cate->name }}</p>
                    <p class="">
                        @if ($cate->description)
                            {{ $cate->description }}
                            </br>
                            Comes standard with Metal Valance.
                        @else
                            The content is being updated.
                        @endif
                    </p>

                </div>
                <div class="col-md-3 col-12"></div>
            </div>
            <div class="product">
                <div class="row">
                    @if (count($products) == 0)
                        <div class="col-12">
                            <p class="text-center">There are currently no products.</p>
                        </div>
                    @else
                        {{-- @dd($productcates) --}}
                        @foreach ($productcates as $product)
                            <div class="col-md-4 col-12 mb-2">
                                <div class="card">
                                    <div class="position-relative">
                                        @if ($product->pic != 'null')
                                            <img src="{{ URL::asset('storage/' . $product->pic) }}"
                                                class="card-img-top img-fluid product-image" alt="{{ $product->name }}">
                                        @else
                                            <img src="{{ URL::asset('images/placeholder/placeholder.png') }}"
                                                class="w-100">
                                        @endif
                                        @if ($logo)
                                            <img src="{{ route('storages.image', ['url' => $logo->pic]) }}" alt="Logo"
                                                id="logo" class="logo">
                                        @else
                                            <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" alt="Logo"
                                                id="logo" class="logo">
                                        @endif
                                        <div class="price-tag position-absolute">
                                            From ${{ $product->from }}
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title font-weight-bold">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <a href="{{ URL::route('home.products', $product->slug) }}"
                                            class="btn btn-dark">Customize Style</a>
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
