@extends('client.master')
@section('title', 'Product')

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('view/style/css/slider-product-recommend.css') }}">
    <style>
        .mySlides,
        .demo {
            display: block !important;
        }
    </style>
    <style>
        body {
            font-family: Arial;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        img {
            vertical-align: middle;
        }

        /* Position the image container (needed to position the left and right arrows) */
        .container {
            position: relative;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Container for image text */
        .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Six columns side by side */
        .column {
            float: left;
            width: 16.66%;
        }

        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

        .carousel-control-image {
            display: block;
            position: relative;

            &::after {
                position: absolute;
                top: 0;
                display: block;
                content: '';
                width: 100%;
                height: 100%;
                background-color: white;
                opacity: 0;
                transition: 0.2s;
            }
        }

        .carousel-control-image.active,
        .carousel-control-image:hover {
            &::after {
                opacity: 0.5;
            }
        }
    </style>
@endsection

@section('content')
    <main id="content-wrapper" class="main-v2">
        <section id="order-shutters" class="container-fluid my-5">
            <div class="row pt-2 px-2">
                {{-- <div class="col-md-6 col-12 d-md-none d-block text-center pl-0">
                    <div class="shutter-image bg-light d-flex justify-content-center align-items-center">
                        <img src="{{ URL::asset('view/style/images/Horizontal Sheer/Image 4-16-24 at 3.32 PM.JPG') }}"
                            id="Cream" class="tabcontent default" alt="Shutter Image" class="img-fluid">
                        <img src="{{ URL::asset('view/style/images/Horizontal Sheer/Image 4-16-24 at 3.30 PM.JPG') }}"
                            id="Simply" class="tabcontent nodefault" alt="Shutter Image" class="img-fluid">
                        <img src="{{ URL::asset('view/style/images/Horizontal Sheer/Image 4-16-24 at 3.33 PM.JPG') }}"
                            id="Winter" class="tabcontent nodefault" alt="Shutter Image" class="img-fluid">
                        <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" alt="Logo" id="logo"
                            class="logo">
                    </div>
                </div> --}}

                <div class="col-md-6 col-12 text-center pl-0">
                    @if (count($colorPros) != 0)
                    <div class="carousel slide mb-2" data-ride="carousel" id="productCarousel">
                        <div class="carousel-inner border" >
                            @foreach ($colorPros as $value)
                            <div class="carousel-item position-relative {{ $loop->first ? 'active' : '' }}" 
                                data-carousel-index={{ $loop->index }}>

                                @if ($value->image != 'null')
                                <img src="{{ route('storages.image', ['url' => $value->image]) }}" 
                                style="object-fit:cover" width="100%">
                                @else
                                <img src="{{ URL::asset('images/placeholder/placeholder.png') }}"
                                style="object-fit:cover" width="100%">
                                @endif
        
                                @if ($logo)
                                <img src="{{ route('storages.image', ['url' => $logo->pic]) }}" 
                                class="position-absolute" width="50" height="50" style="top:0;left:0;object-fit:cover">
                                @else
                                <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" 
                                class="position-absolute" width="50" height="50" style="top:0;left:0;object-fit:cover">
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <ul class="d-flex flex-row pb-2" style="overflow-x:auto">
                        @foreach ($colorPros as $value)
                        <li data-target="#productCarousel" data-slide-to="{{ $loop->index }}" 
                            class="border mr-2 carousel-control-image {{ $loop->first ? 'active' : '' }}" type="button">

                            @if ($value->image != 'null')
                            <img src="{{ route('storages.image', ['url' => $value->image]) }}" 
                            style="object-fit:cover" width="120" height="100">
                            @else
                            <img src="{{ URL::asset('images/placeholder/placeholder.png') }}"
                            style="object-fit:cover" width="120" height="100">
                            @endif
                        </li>
                        @endforeach
                    </ul>

                    @else

                    <div>
                        @if ($product->pic)
                        <img src="{{ route('storages.image', ['url' => $product->pic]) }}" style="width:100%; heigth: 100px;">
                        @else
                        <img src="{{ URL::asset('images/placeholder/placeholder.png') }}">
                        @endif
                    </div>
                    @endif
                </div>

                {{-- Select order --}}
                @livewire('product-select-order', [
                    'product' => $product, 
                    'colorPros' => $colorPros, 
                    'orders' => $orders,
                    'showStars' => $showStars,
                ])
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
                                        <div class="progress-bar bg-dark" role="progressbar"
                                            style="width: {{ ($showStars['star_5_avg']) * 100 }}%;"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>{{ $showStars['star_5'] }}</span>
                                </div>
                                <div class="rating-row">
                                    <span>4 stars</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar"
                                            style="width:  {{ ($showStars['star_4_avg']) * 100 }}%;"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>{{ $showStars['star_4'] }}</span>
                                </div>
                                <div class="rating-row">
                                    <span>3 stars</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar"
                                            style="width:  {{ ($showStars['star_3_avg']) * 100 }}%;"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>{{ $showStars['star_3'] }}</span>
                                </div>
                                <div class="rating-row">
                                    <span>2 stars</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar"
                                            style="width:  {{ ($showStars['star_2_avg']) * 100 }}%;"
                                            aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>{{ $showStars['star_2'] }}</span>
                                </div>
                                <div class="rating-row">
                                    <span>1 star</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar"
                                            style="width:  {{ ($showStars['star_1_avg']) * 100 }}%;"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>{{ $showStars['star_1'] }}</span>
                                </div>
                            </div>

                            <!-- Overall Rating -->
                            <div class="col-md-6 text-center">
                                <h5>Overall Rating</h5>
                                <div class="overall-rating">
                                    <h1>{{ $showStars['sum'] }}</h1>
                                    <p class="stars comment-stars" data-rating="{{ $showStars['sum'] }}">
                                    </p>
                                    <p>{{ $showStars['count'] }} Reviews</p>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center mt-2">
                            <div class="col-4"></div>
                            <div class="col-4 ">
                                {{-- <a href="" class=""><span class="">
                                        <i class="fa-regular fa-paste"></i> Write a
                                        review</span>
                                </a> --}}
                                <div class=" text-center">
                                    <a type="button" class="btn d-block" data-toggle="modal"
                                        data-target="#reviewcontent">
                                        <i class="fa-solid fa-angles-down"></i>
                                        <span class="d-block">View ALL</span>
                                    </a>
                                </div>
                                <div class="">
                                    <button type="button" class="text-capitalize review" data-toggle="modal"
                                        data-target="#imageProductReview" title="List Image">
                                        <i class="fa-regular fa-images"></i> Write a review
                                    </button>
                                </div>
                            </div>
                            <div class="col-4"></div>
                        </div>
                        <livewire:client.review product_id="{{ $product->id }}" />
                        <livewire:client.reviewcontent product_id="{{ $product->id }}" />
                    </div>
                    <!-- Tab Materials + Care -->
                    <div class="tab-pane fade bg-white border-0" id="materials" role="tabpanel"
                        aria-labelledby="materials-tab">
                        <p>{!! $product->materials_care !!}</p>
                    </div>

                    <!-- Tab Shipping & Received -->
                    <div class="tab-pane fade bg-white border-0" id="shipping" role="tabpanel"
                        aria-labelledby="shipping-tab">
                        <p>{!! $product->shipping_received !!}</p>
                    </div>
                </div>
            </div>

            <div class="container mt-5">

            </div>
        </section>

        <section id="recommended-product" class="mt-5 pt-5 border-top">
            <h2 class="product-category text-center">RECOMMENDED PRODUCTS</h2>
            <button class="pre-btn"><img src="{{ asset('view/style/images/arrow.png') }}" alt=""></button>
            <button class="nxt-btn"><img src="{{ asset('view/style/images/arrow.png') }}" alt=""></button>
            <div class="product-containers">
                @if ($proRecommend)

                    @foreach ($proRecommend as $proValue)
                    <div class="product-card">
                        <div class="product-image border">
                            <a href="{{ URL::route('home.products', $proValue['slug']) }}" class="boder-0">
                                @if ($proValue['pic'])
                                    <img src="{{ route('storages.image', ['url' => $proValue['pic']]) }}"
                                        class="card-img-top product-image roduct-thumb" alt="">
                                @else
                                    <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" id="logo"
                                        class="logo">
                                @endif

                                @if ($logo)
                                    <img src="{{ route('storages.image', ['url' => $logo->pic]) }}" alt="Logo"
                                        id="logo" class="logo">
                                @else
                                    <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" alt="Logo"
                                        id="logo" class="logo">
                                @endif

                                <button class="card-btn text-white bg-dark border border-dark">come see</button>
                            </a>
                        </div>
                        <div class="product-info">
                            <p class="product-short-description font-weight-bolder card-title text-uppercase">
                                {{ $proValue['description'] }}
                            </p>
                            <h2 class="product-brand card-text font-weight-bolder">{{ $proValue['name'] }}</h2>
                            <h5 class=""></h5>
                            @if ($proValue['fromOLD'])
                                <small class="text-muted">Starting
                                    <span class="font-weight-bolder text-danger">${{ $proValue['from'] }}</span>
                                    <del>${{ $proValue['fromOLD'] }}</del>
                                </small>
                            @else
                                <small class="text-muted">From
                                    <span class="font-weight-bolder text-muted text-black">${{ $proValue['from'] }}</span>
                                </small>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    Updating !!!!!
                @endif
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script src="{{ URL::asset('view/style/js/slider-product-recommend.js') }}"></script>
    <script>
        let slideIndex = 1;
        // showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("demo");
            let captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
    <script>
        function selectImage(imageSrc, text, idSuffix) {
            document.getElementById('selectedImage' + idSuffix).src = imageSrc;
            document.getElementById('selectedImage' + idSuffix).style.display = 'inline';

            document.getElementById('selectedText' + idSuffix).innerHTML = text;
            document.getElementById('selectedText' + idSuffix).style.display = 'block';

            $('#collapseOne' + idSuffix).collapse('hide');

            calculateTotal();
        }

        function calculateTotal() {
            var total = 0;
            var numbers = document.querySelectorAll('.number');

            numbers.forEach(function(span) {
                total += parseInt(span.innerText);
            });

            document.getElementById('total').innerText = total;
        }

        window.onload = calculateTotal;
    </script>

    <script>
        function scrollToView(element) {
            element.parentElement.scrollIntoView({
                behavior: 'smooth',
                inline: 'center'
            });
        }
    </script>
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

        // document.addEventListener("DOMContentLoaded", function() {
        //     @if ($colorPros && $colorPros->isNotEmpty())
        //         var firstColorName = @json($colorPros->first()->id);
        //         document.getElementById(firstColorName).style.display = "block";
        //         document.querySelector(".color-option img").style.border = "double black";
        //     @endif
        // });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".comment-stars").forEach(function(starContainer) {
                let rating = parseFloat(starContainer.getAttribute("data-rating"));
                let fullStars = Math.floor(rating); // Số sao đầy
                let halfStar = rating % 1 !== 0; // Kiểm tra có sao nửa không
                let emptyStars = 5 - fullStars - (halfStar ? 1 : 0); // Số sao rỗng còn lại

                let starsHtml = "";
                for (let i = 0; i < fullStars; i++) {
                    starsHtml += '<i class="fa fa-star"></i>';
                }
                if (halfStar) {
                    starsHtml += '<i class="fa fa-star-half-alt"></i>';
                }
                for (let i = 0; i < emptyStars; i++) {
                    starsHtml += '<i class="fa-regular fa-star"></i>';
                }
                starContainer.innerHTML = starsHtml;
            });
        });
    </script>

    <script>
        function normalizeSlideHeights() {
            $('.carousel').each(function(){
            var items = $('.carousel-item', this);
            // reset the height
            items.css('min-height', 0);
            // set the height
            var maxHeight = Math.max.apply(null, 
                items.map(function(){
                    return $(this).outerHeight()}).get() );
            items.css('min-height', maxHeight + 'px');
            })
        }

        $(window).on('load resize orientationchange', normalizeSlideHeights);
    </script>

    <script>
        $(document).ready(function() {
            $('#productCarousel').on('slide.bs.carousel', function(e) {
                var carousel_index = $(e.relatedTarget).attr('data-carousel-index') ?? 0;

                $('.carousel-control-image[data-target="#productCarousel"].active').removeClass('active');
                $(`.carousel-control-image[data-target="#productCarousel"][data-slide-to=${carousel_index}]`).addClass('active');
            });
        });
    </script>
@endsection
