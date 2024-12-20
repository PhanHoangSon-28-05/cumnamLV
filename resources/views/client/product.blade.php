@extends('client.master')
@section('title', $product->name)

@section('style')
    <style>
        .mySlides,
        .demo {
            display: block !important;
        }
    </style>
@endsection
{{-- @dd($colorPros) --}}
@section('content')
    <main id="content-wrapper" class="main-v2">
        <section id="order-shutters" class="container-fluid my-5">
            <div class="row">
                <div class="col-md-6 col-12 text-center pl-0">
                    <div class="shutter-image bg-light d-flex justify-content-center align-items-center product-container">
                        <span class="d-none">{{ $con = 1 }} </span>
                        @if ($colorPros && $colorPros->isNotEmpty())
                            @foreach ($colorPros as $value)
                                @if ($con == 1)
                                    <img src="{{ route('storages.image', ['url' => $value->image]) }}"
                                        id="{{ $value->id }}" class="tabcontent default img-fluid product-image"
                                        alt="Shutter Image">
                                    <span class="d-none">{{ $con++ }} </span>
                                @else
                                    <img src="{{ route('storages.image', ['url' => $value->image]) }}"
                                        id="{{ $value->id }}" class="tabcontent nodefault img-fluid product-image"
                                        alt="Shutter Image">
                                @endif
                            @endforeach
                        @else
                            @if ($product->pic)
                                <img src="{{ route('storages.image', ['url' => $product->pic]) }}" id="defaultImage"
                                    class="tabcontent default img-fluid product-image" alt="">
                            @else
                                <p class="text-body">Updating product images</p>
                            @endif
                        @endif
                        <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" alt="Logo" id="logo"
                            class="logo">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <form method="get" action="{{ route('home.order', ['slug' => $product->slug]) }}">
                        <div class="accordion mb-4" id="accordionExample">
                            <div class="">
                                <div class="product-info">
                                    <!-- Tên sản phẩm và đánh giá -->
                                    <h2 class="product-title">Zebra 5 inch</h2>
                                    <div class="rating-reviews">
                                        <span class="stars">★★★★☆</span>
                                        <span class="reviews">4.0 (11 reviews)</span>
                                    </div>

                                    <div class="price">
                                        <h3>$ 80</h3>
                                    </div>

                                    <div class="color-selection">
                                        <p class="mb-0">Color:</p>
                                        <div class="">
                                            <ul class="d-flex flex-row bd-highlight mb-3" id="myUL">
                                                @if ($colorPros && $colorPros->isNotEmpty())
                                                    @foreach ($colorPros as $value)
                                                        <li class="color-option text-center tablinks"
                                                            onmouseover="openCity(event, '{{ $value->id }}')">
                                                            <label for="option{{ $loop->index }}" class="radio-img-label">
                                                                <img src="{{ route('storages.image', ['url' => $value->fabriccolor]) }}"
                                                                    alt="Option {{ $loop->index }}"
                                                                    id="option{{ $loop->index }}">
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <p>No colors available for this product.</p>
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <div class="window-size">
                                        <label>Window Width (Inch):</label>
                                        <div class="size-select">
                                            <select class="mb-2" name="width1">
                                                <option>40</option>
                                                <option>50</option>
                                                <option>60</option>
                                            </select>
                                            <select class="mb-2" name="width2">
                                                <option>1/8</option>
                                                <option>1/4</option>
                                                <option>1/2</option>
                                            </select>
                                        </div>

                                        <label>Window Height (Inch):</label>
                                        <div class="size-select">
                                            <select name="height1">
                                                <option>50</option>
                                                <option>60</option>
                                                <option>70</option>
                                            </select>
                                            <select name="height2">
                                                <option>1/4</option>
                                                <option>1/2</option>
                                                <option>3/4</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="text-md-left">
                            <button id="customizeBuyButton" type="submit" class="btn text-uppercase rounded-pill">Customize
                                &
                                Buy</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section id="product-features" class="container-fluid my-5">
            <div class="container mt-4 p-0">
                <!-- Tabs điều hướng -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab"
                            aria-controls="about" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab"
                            aria-controls="details" aria-selected="false">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                            aria-controls="reviews" aria-selected="false">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="materials-tab" data-toggle="tab" href="#materials" role="tab"
                            aria-controls="materials" aria-selected="false">Materials + Care</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab"
                            aria-controls="shipping" aria-selected="false">Shipping & Received</a>
                    </li>
                </ul>

                <!-- Nội dung tab -->
                <div class="tab-content" id="myTabContent">
                    <!-- Tab About -->
                    <div class="tab-pane p-0 pt-md-5 pt-3 fade bg-white border-0 show active" id="about"
                        role="tabpanel" aria-labelledby="about-tab">
                        <p>{!! $product->about !!}</p>
                    </div>

                    <!-- Tab Details -->
                    <div class="tab-pane p-0 pt-md-5 pt-3 fade bg-white border-0" id="details" role="tabpanel"
                        aria-labelledby="details-tab">
                        <p>{!! $product->details !!}</p>
                    </div>

                    <!-- Tab Reviews -->
                    <div class="tab-pane p-0 pt-md-5 pt-3 fade bg-white border-0" id="reviews" role="tabpanel"
                        aria-labelledby="reviews-tab">
                        <h3>Reviews</h3>
                        <div class="row">
                            <!-- Rating Snapshot -->
                            <div class="col-md-6">
                                <h5>Rating Snapshot</h5>
                                <p>Select a row below to filter reviews.</p>
                                <div class="rating-row">
                                    <span>5 stars</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: 70%;"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>4369</span>
                                </div>
                                <div class="rating-row">
                                    <span>4 stars</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: 10%;"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>517</span>
                                </div>
                                <div class="rating-row">
                                    <span>3 stars</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: 15%;"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>606</span>
                                </div>
                                <div class="rating-row">
                                    <span>2 stars</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: 12%;"
                                            aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>699</span>
                                </div>
                                <div class="rating-row">
                                    <span>1 star</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: 20%;"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>875</span>
                                </div>
                            </div>

                            <!-- Overall Rating -->
                            <div class="col-md-6 text-center">
                                <h5>Overall Rating</h5>
                                <div class="overall-rating">
                                    <h1>4.0</h1>
                                    <p class="stars">
                                        ★★★★☆
                                    </p>
                                    <p>7066 Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Materials + Care -->
                    <div class="tab-pane fade bg-white border-0" id="materials" role="tabpanel"
                        aria-labelledby="materials-tab">
                        <p>{{ $product->tabpanel }}</p>
                    </div>

                    <!-- Tab Shipping & Received -->
                    <div class="tab-pane fade bg-white border-0" id="shipping" role="tabpanel"
                        aria-labelledby="shipping-tab">
                        <p>Shipping and received content goes here...</p>
                    </div>
                </div>
            </div>

            <div class="container mt-5">

            </div>
        </section>

        <section id="recommended-product" class="container-fluid my-5">
            <div class="container">
                <h2 class="text-center mt-5 mb-4">RECOMMENDED PRODUCTS</h2>

                <div class="row">
                    <div class="col-md-3 col-12 mb-2">
                        <div class="card product-container">
                            <img src="{{ URL::asset('view/style/images/Zebra/Artboard 120@4x.jpg') }}"
                                class="card-img-top product-image" alt="Wood Blind">
                            <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" alt="Logo"
                                id="logo" class="logo">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">3" Vane</h5>
                                <p class="card-text font-weight-bolder">WOOD BLIND</p>
                                <p class="card-text"><small class="text-muted">Starting <del>$150</del> $110 </small>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12 mb-2">
                        <div class="card">
                            <img src="{{ URL::asset('view/style/images/Zebra/Artboard 13@4x.jpg') }}"
                                class="card-img-top" alt="Zebra Roman">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">3" VANE-2" SHEER</h5>
                                <p class="card-text font-weight-bolder">THE ZEBRA ROMAN</p>
                                <p class="card-text"><small class="text-muted">Starting <del>$110</del> $150 </small>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12 mb-2">
                        <div class="card">
                            <img src="{{ URL::asset('view/style/images/Zebra/Artboard 13@4x.jpg') }}"
                                class="card-img-top" alt="Vertical Sheer">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">MAY 2025</h5>
                                <p class="card-text font-weight-bolder">THE VERTICAL SHEER</p>
                                <p class="card-text"><small class="text-muted">Starting <del>$110</del> $150 </small>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-12 mb-2">
                        <div class="card">
                            <img src="{{ URL::asset('view/style/images/Zebra/Artboard 169@4x.jpg') }}"
                                class="card-img-top" alt="Wood Blind">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">3" Vane</h5>
                                <p class="card-text font-weight-bolder">WOOD BLIND</p>
                                <p class="card-text"><small class="text-muted">Starting <del>$150</del> $110 </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        function openCity(evt, cityName) {
            // Ẩn tất cả các tab nội dung
            document.querySelectorAll(".tabcontent").forEach(tab => tab.style.display = "none");

            // Hiển thị tab nội dung đã chọn
            document.getElementById(cityName).style.display = "block";

            // Xóa border của tất cả các lựa chọn màu
            document.querySelectorAll(".color-option img").forEach(img => img.style.border = "double transparent");

            // Thêm border vào ảnh đã chọn
            evt.currentTarget.querySelector("img").style.border = "double black";
        }

        document.addEventListener("DOMContentLoaded", function() {
            @if ($colorPros && $colorPros->isNotEmpty())
                var firstColorName = @json($colorPros->first()->id);
                document.getElementById(firstColorName).style.display = "block";
                document.querySelector(".color-option img").style.border = "double black";
            @endif
        });
    </script>
@endsection
