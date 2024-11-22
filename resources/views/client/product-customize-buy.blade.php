@extends('client.master')
@section('title', 'Product')

@section('style')

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
    </style>
@endsection

@section('content')
    <main id="content-wrapper" class="main-v2">
        <section id="order-shutters" class="container-fluid my-5">
            <div class="row pt-2">
                <div class="col-md-6 col-12 d-md-none d-block text-center pl-0">
                    <div class="shutter-image bg-light d-flex justify-content-center align-items-center">
                        <img src="{{ URL::asset('view/style/images/Horizontal Sheer/Image 4-16-24 at 3.32 PM.JPG') }}"
                            id="Cream" class="tabcontent default" alt="Shutter Image" class="img-fluid">
                        <img src="{{ URL::asset('view/style/images/Horizontal Sheer/Image 4-16-24 at 3.30 PM.JPG') }}"
                            id="Simply" class="tabcontent nodefault" alt="Shutter Image" class="img-fluid">
                        <img src="{{ URL::asset('view/style/images/Horizontal Sheer/Image 4-16-24 at 3.33 PM.JPG') }}"
                            id="Winter" class="tabcontent nodefault" alt="Shutter Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="accordion" id="accordionExample">
                        <h2 class="product-title">{{ $product->name }}</h2>
                        <div class="text-center">
                            <p class="text-uppercase w-50 mx-auto">{{ $product->description }}</p>
                        </div>
                        <div class="mb-1">
                            @if (count($colorPros) != 0)
                                <div class="card rounded border-0 color">
                                    <div class="card-header bg-white border-dark" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left d-flex" type="button"
                                                data-toggle="collapse" data-target="#collapseOne0" aria-expanded="true"
                                                aria-controls="collapseOne0">
                                                <span class="flex-grow-1 text-dark">Fabric color</span>
                                                <div class="show-img-text d-flex">
                                                    <div id="selectedText0" class="text-show text-muted flex-grow-1">
                                                    </div>
                                                    <div class="">
                                                        <img id="selectedImage0" src="" alt="Selected Image"
                                                            class="img-show img-fluid ml-1">
                                                    </div>
                                                </div>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne0" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="d-flex flex-row bd-highlight mb-3 mt-3" id="myUL">
                                                @foreach ($colorPros as $value)
                                                    <li class="color-option text-center">
                                                        <input type="radio" id="{{ 'option' . $value->id }}"
                                                            name="image-radio" class="radio-img" value="{{ $value->id }}"
                                                            onclick="selectImage('{{ asset('storage/' . $value->fabriccolor) }}', '{{ $value->color->name }}', '0'); scrollToView(this)">
                                                        <label for="{{ 'option' . $value->id }}" class="radio-img-label">
                                                            <img src="{{ asset('storage/' . $value->fabriccolor) }}"
                                                                alt="{{ $value->name }}">
                                                            <span class="text-dark">{{ $value->name }}</span> </br>
                                                            @if ($value->priceNew == 0)
                                                            @else
                                                                <span class="text-dark"
                                                                    style="text-decoration: underline;">{{ $value->priceNew }}$</span>
                                                            @endif
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @include('client.partials.prante-item-product', [
                                'id_product' => $product->id,
                            ])

                        </div>
                    </div>
                    <div class="row mb-2 border-bottom border-dark mx-3">
                        <div class="col-8">
                            <p class="text-uppercase font-weight-bolder pl-0 mb-0 h3 d-block d-md-none">
                                Total Price:</p>
                            <p class="text-uppercase font-weight-bolder pl-5 d-sm-block d-none h3">
                                Total Price:</p>
                        </div>
                        <div class="col-4">
                            <p class="mb-0 h2">$<span id="total"></span></p>
                        </div>
                    </div>
                    <div class="row mx-3">
                        <div class="col-3 px-0 mx-0 size-select">
                            <select class="w-100">
                                @for ($i = 1; $i <= 100; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-9 pr-0">
                            <a id="customizeBuyButton" class="btn w-100 p-2" href="product-customize-buy.html" disabled>Add
                                to bag</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 d-none d-sm-block text-center pl-0">
                    @if (count($colorPros) != 0)
                        <div class="">
                            @foreach ($colorPros as $value)
                                <div class="mySlides">
                                    <img src="{{ asset('storage/' . $value->image) }}" style="width:100%; heigth: 100px;">
                                </div>
                            @endforeach
                            <div class="caption-container">
                                <p id="caption"></p>
                            </div>

                            <div class="">
                                <span class="d-none"></span> <?php $i = 1; ?>
                                @foreach ($colorPros as $value)
                                    <div class="column">
                                        <img class="demo cursor" src="{{ asset('storage/' . $value->fabriccolor) }}"
                                            style="width:100%" onclick="currentSlide({{ $i }})"
                                            alt="{{ $value->name }}">
                                    </div>
                                    <span class="d-none"> {{ $i++ }}</span>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="mySlides">
                            <img src="{{ asset('storage/' . $product->pic) }}" style="width:100%; heigth: 100px;">
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

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
@endsection
