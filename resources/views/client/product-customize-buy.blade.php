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
                @livewire('product-select-order', ['product' => $product, 'colorPros' => $colorPros, 'orders' => $orders])
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
                            @if ($product->pic)
                                <img src="{{ asset('storage/' . $product->pic) }}" style="width:100%; heigth: 100px;">
                            @else
                                <p class="text-body">Updating product images</p>
                            @endif
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
