<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>

    <link rel="stylesheet" href="{{ URL::asset('view/bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/style/ajax/libs/slick-carousel/1.6.0/slick.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/style/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:100">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ URL::asset('view/style/css/font-face.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/style/css/custom.css') }}">

    <!-- Slider product -->
    <link rel="stylesheet" href="https://unpkg.com/jquery.flipster@1.1.2/dist/jquery.flipster.min.css">
    <!-- End slider pruduct -->
    <script src="{{ URL::asset('view/style/ajax/libs/jquery/3.1.1/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('view/style/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.js') }}"></script>
    <script src="{{ URL::asset('view/style/ajax/libs/slick-carousel/1.6.0/slick.min.js') }}"></script>

    <!-- <link rel="stylesheet" href="style/slider/line/line.css"> -->

</head>

<body>
    <header id="header" class="header">
        @include('client.header')
    </header>

    @yield('content')

    <footer class="mt-3" style="background-color: D9D9D9;">
        <div class="container-fluid my-md-5 mt-2">
            <div class="row">
                <div class="col-md-4 col-12">
                    <h4 class="text-uppercase">SUPPORT</h4>
                    <p class="text-uppercase mb-0">REFUND & EXCHANGE</p>
                    <p class="text-uppercase mb-0">WARRANTY</p>
                    <p class="text-uppercase mb-0">HOW TO MEASURE</p>
                    <p class="text-uppercase mb-0">HOW TO INSTALL</p>
                </div>
                <div class="col-md-4 col-12 connect">
                    <h4 class="text-uppercase">CONNECT WITH US</h4>
                    <a class="text-uppercase"><i class="fa-solid fa-camera-retro"></i></a>
                    <a class="text-uppercase"><i class="fa-solid fa-phone"></i></a>
                    <a class="text-uppercase"><i class="fa-brands fa-facebook-messenger"></i></a>
                </div>
                <div class="col-md-4 col-12">
                    <h4 class="text-uppercase">SUBSCRIBE</h4>
                    <p class="text-uppercase">Sign up for our newsletter to receive 10%​Off* on your first order & get
                        updates on ​promotions, lifestyle guides, and more!</p>
                    <div class="mt-md-5 mt-2">
                        <input type="text">
                        <a href="" class="btn text-uppercase">Sing up</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ URL::asset('view/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('view/style/js/custom.js') }}"></script>

    <script>
        function changeImage(imageId, newImageSrc) {
            document.getElementById(imageId).src = newImageSrc;
        }
    </script>

    <!-- Slider product -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://unpkg.com/jquery.flipster@1.1.2/dist/jquery.flipster.min.js"></script>
    <!-- End slider pruduct -->

    <script>
        console.clear();

        var flipContainer = $('.flipster'),
            flipItemContainer = flipContainer.find('.flip-items'),
            flipItem = flipContainer.find('li');

        var f = flipContainer.flipster({
            itemContainer: flipItemContainer,
            itemSelector: flipItem,
            loop: true,
            style: 'carousel',
            spacing: -0.5,
            scrollwheel: false,
            buttons: true,
            animationSpeed: 3000,
            autoplay: 3000,
            onItemSwitch: function(currentItem, previousItem) {
                $('.flipster__nav__item').removeClass('flipster__nav__item--current');
                var currentIndex = $(currentItem).index();
                $('.flipster__nav__item').eq(currentIndex).addClass('flipster__nav__item--current');
            }
        });

        // Xử lý khi click vào dấu chấm
        $(document).on('click', '.flipster__nav__item', function() {
            var index = $(this).index();
            f.flipster('jump', index); // Nhảy đến hình ảnh tương ứng với dấu chấm
        });
    </script>

</body>

</html>
