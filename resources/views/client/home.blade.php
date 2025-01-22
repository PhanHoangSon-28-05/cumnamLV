@extends('client.master')
@section('title', 'Home')

@section('content')
    <main id="content-wrapper" class="main-v2 text-body">
        <section id="introduction-section" class="container-fluid mt-2 px-0">
            <div class="slider-container">
                <div id="sliderTrack" class="slider-track">
                    @foreach ($sliders as $value)
                        <div class="slider-item"
                            style="background-image: url('{{ route('storages.image', ['url' => $value->pic]) }}');">
                        </div>
                    @endforeach
                </div>
                <button class="get-started-btn">Get Started</button>
            </div>
            {{-- <div class="row">
                <div class="col-6 pr-0 pr-md-2 image-left">
                    <img src="{{ URL::asset('view/style/images/hinh-1.jpg') }}" class=" rounded" alt="Top Image">
                    <h3 class="">CUSTOM-MADE SHADES & BLINDS</h3>
                    <p class="">HIGH QUALITY WITHOUT HEFTY PRICE TAGS</p>
                    <a class="btn btn-primary rounded-pill">GET STARTED</a>
                </div>
                <div class="col-6 image-right">
                    <img src="{{ URL::asset('view/style/images/hinh-2.png') }}" class="rounded" alt="Right Image">
                </div>
            </div> --}}
        </section>
        <section class="container my-md-5 mb-0 mt-3 process-work">
            <div class="row step-row">
                <div class="col-4">
                    <div class="card pl-1 mb-2 mb-md-5 border-0">
                        <img src="{{ URL::asset('view/style/images/32acce8ca1f734b86113d04540b96eb8.svg') }}" alt="Measure"
                            class="step-icon rounded ">
                        <h5 class="step-title text-uppercase">BEST PRICING</h5>
                        <p class="text-truncate">"Meals with my family are always extra special because of the
                            beautiful
                            plates I got from
                            Custom & Nooke."</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card pl-1 mb-2 mb-md-5 border-0">
                        <img src="{{ URL::asset('view/style/images/03bd4576649ef1d56e4816d333f80cfc.svg') }}" alt="Order"
                            class="step-icon rounded ">
                        <h5 class="step-title text-uppercase">PERFECT FIT</h5>
                        <p class="text-truncate">"Very pleased with my new sofa--the quality is great, it's
                            comfortable,
                            and elevates the look
                            of my home."
                        </p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card pl-1 mb-2 mb-md-5 border-0">
                        <img src="{{ URL::asset('view/style/images/7e38d417227a447a118273e451275720.svg') }}" alt="Install"
                            class="step-icon rounded ">
                        <h5 class="step-title text-uppercase">SATISFACTIO​N GUARENTEE</h5>
                        <p class="text-truncate">"I love how timeless my decor are. I just need to move things around
                            to
                            update the look of my
                            space."</p>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <section class="container-fluid my-md-5 mt-0 products" style="background-color: #EFEFEF;">
            <div class="container-product">
                <div class="px-md-5 px-sm-0">
                    @if ($producthome)
                        <h1 class="text-center text-uppercase">{{ $producthome->name }}</h1>
                        <p class="text-center">{{ $producthome->content }}
                    @endif
                    </p>
                    <div class="shop-now">
                        <a class="text-white bg-dark border border-dark" href="#">LEARN​MORE</a>
                    </div>
                </div>
                <div class=" d-none d-sm-block">
                    <div class="row">
                        @if ($lisporudct)
                            @foreach ($lisporudct as $value)
                                <div class="col-3 my-1 ">
                                    <a href="{{ URL::route('home.products', $value->slug) }}">
                                        <div class="card product-container">
                                            @if ($value->pic != 'null')
                                                {{-- <img id="{{ $value->slug }}"
                                                    src="{{ URL::asset('storage/' . $value->pic) }}" class="card-img-top"
                                                    alt="Oakley"> --}}
                                                <img id="{{ $value->slug }}"
                                                    src="{{ route('storages.image', ['url' => $value->pic]) }}"
                                                    class="card-img-top product-image" alt="Oakley">
                                                @if ($logo)
                                                    <img src="{{ route('storages.image', ['url' => $logo->pic]) }}"
                                                        alt="Logo" id="logo" class="logo">
                                                @else
                                                    <img src="{{ URL::asset('images/placeholder/placeholder.png') }}"
                                                        alt="Logo" id="logo" class="logo">
                                                @endif
                                            @else
                                                <img id="{{ $value->slug }}"
                                                    src="{{ URL::asset('images/placeholder/placeholder.png') }}"
                                                    class="card-img-top" alt="Oakley">
                                            @endif
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    @if (count($value->item) != 0)
                                                        <?php
                                                        $count = count($value->item);
                                                        $i = 1;
                                                        $moreShown = false;
                                                        ?>

                                                        @if ($count <= 5)
                                                            @foreach ($value->item as $color)
                                                                @if ($color->id_color != null)
                                                                    <div class="color-dot"
                                                                        style="background-color: {{ $color->color->code_color }};"
                                                                        onmouseover="changeImage('{{ $value->slug }}', '{{ URL::asset('storage/' . $color->image) }}')">
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @foreach ($value->item as $color)
                                                                @if ($i <= 4)
                                                                    @if ($color->id_color != null)
                                                                        <div class="color-dot"
                                                                            style="background-color: {{ $color->color->code_color }};"
                                                                            onmouseover="changeImage('{{ $value->slug }}', '{{ URL::asset('storage/' . $color->image) }}')">
                                                                        </div>
                                                                        <?php $i++; ?>
                                                                    @endif
                                                                @elseif (!$moreShown)
                                                                    <p><a href="#"
                                                                            class="text-decoration-none text-dark">+
                                                                            {{ $count - $i }} more</a></p>
                                                                    <?php $moreShown = true; ?>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </div>
                                                <h5 class="card-title">
                                                    <span class="float-left">{{ $value->name }}</span>
                                                    @if ($value->promotion)
                                                        <span
                                                            class="badge badge-discount float-right text-uppercase">{{ $value->promotion }}%
                                                            OFF</span>
                                                    @endif
                                                </h5>
                                                <br>
                                                <p class="card-text">{{ $value->description }}</p>
                                                @if ($value->fromOLD)
                                                    <p class="card-text card-price">
                                                        <small class="text-muted">From
                                                            <span
                                                                class="font-weight-bolder h5 text-danger">${{ $value->from }}</span>
                                                            <del>${{ $value->fromOLD }}</del>
                                                        </small>
                                                    </p>
                                                @else
                                                    <p class="card-text card-price">
                                                        <small class="text-muted">From
                                                            <span
                                                                class="font-weight-bolder h5 text-black">${{ $value->from }}</span>
                                                        </small>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            Updating !!!!!
                        @endif
                    </div>
                </div>
                <div class=" d-md-none d-block">
                    <div class="row">
                        <div class="flipster">
                            <ul class="flip-items">
                                @if ($lisporudct)
                                    @foreach ($lisporudct as $value)
                                        <li class="col-10">
                                            <a href="{{ URL::route('home.products', $value->slug) }}">
                                                <div class="card">
                                                    <img src="{{ route('storages.image', ['url' => $value->pic]) }}"
                                                        class="card-img-top" alt="Oakley">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            @if (count($value->item) != 0)
                                                                <?php
                                                                $count = count($value->item);
                                                                $i = 1;
                                                                $moreShown = false;
                                                                ?>

                                                                @if ($count <= 5)
                                                                    @foreach ($value->item as $color)
                                                                        @if ($color->id_color != null)
                                                                            <div class="color-dot"
                                                                                style="background-color: {{ $color->color->code_color }};">
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($value->item as $color)
                                                                        @if ($i <= 4)
                                                                            @if ($color->id_color != null)
                                                                                <div class="color-dot"
                                                                                    style="background-color: {{ $color->color->code_color }};">
                                                                                </div>
                                                                                <?php $i++; ?>
                                                                            @endif
                                                                        @elseif (!$moreShown)
                                                                            <p><a href="#"
                                                                                    class="text-decoration-none text-dark">+
                                                                                    {{ $count - $i }} more</a></p>
                                                                            <?php $moreShown = true; ?>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <h5 class="card-title">
                                                            <span class="float-left">{{ $value->name }}</span>
                                                            @if ($value->promotion)
                                                                <span
                                                                    class="badge badge-discount float-right text-uppercase">{{ $value->promotion }}%
                                                                    OFF</span>
                                                            @endif
                                                        </h5>
                                                        <br>
                                                        <p class="card-text">{{ $value->description }}</p>
                                                        @if ($value->fromOLD)
                                                            <p class="card-text card-price">
                                                                <small class="text-muted">From
                                                                    <span
                                                                        class="font-weight-bolder h5 text-danger">${{ $value->from }}</span>
                                                                    <del>${{ $value->fromOLD }}</del>
                                                                </small>
                                                            </p>
                                                        @else
                                                            <p class="card-text card-price">
                                                                <small class="text-muted">From
                                                                    <span
                                                                        class="font-weight-bolder h5 text-black">${{ $value->from }}</span>
                                                                </small>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    Updating !!!!!
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid my-md-5 mb-0 process-work text-center">
            <div class="px-5">
                <h1 class="text-center text-uppercase d-none d-md-block">DIY WITH OUR EASY STEPS</h1>
                <h3 class="text-center text-uppercase d-md-none d-block">DIY WITH OUR EASY STEPS</h3>
            </div>
            <div class="row step-row">
                <div class="col-3">
                    <div class="card pl-1 mb-md-5 mb-0 border-0" id="steps">
                        <img src="{{ URL::asset('view/style/images/869ef8f4ec499c3e11feed4bad1aff76.svg') }}"
                            alt="Measure" class="step-icon rounded mx-auto d-block">
                        <h6 class="mb-md-4 mb-3 d-md-none d-block">
                            <span
                                class="bg-dark border border-dark rounded-circle text-white px-1 py-1 font-weight-bolder">1</span>
                        </h6>
                        <h6 class="mb-4 d-none d-md-block">
                            <span
                                class="bg-dark border border-dark rounded-circle text-white px-3 py-2 font-weight-bolder h5">1</span>
                        </h6>
                        <h5 class="step-title text-uppercase">BMEASURE</h5>
                        <p class="h5">All you need is a measure​tape. Check our <span><a href="">How to
                                    ​measure</a></span> for an
                            easy​intrusctions before
                            ordering</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card pl-1 mb-md-5 mb-0 border-0" id="steps">
                        <img src="{{ URL::asset('view/style/images/7b4b81ba71cd9ea9e62e30ed93f2f082.svg') }}"
                            alt="Order" class="step-icon rounded mx-auto d-block">
                        <h6 class="mb-md-4 mb-3 d-md-none d-block">
                            <span
                                class="bg-dark border border-dark rounded-circle text-white px-1 py-1 font-weight-bolder">2</span>
                        </h6>
                        <h6 class="mb-4 d-none d-md-block">
                            <span
                                class="bg-dark border border-dark rounded-circle text-white px-3 py-2 font-weight-bolder h5">2</span>
                        </h6>
                        <h5 class="step-title text-uppercase">ORDER & RECEIVE</h5>
                        <p class="h5">All custom order takes 3-4 da​ys to make and 5 days to sh​ip to your p​lace
                        </p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card pl-1 mb-md-5 mb-0 border-0" id="steps">
                        <img src="{{ URL::asset('view/style/images/7752bbabf34b9e9dffb4c825b7ebefe6.svg') }}"
                            alt="Install" class="step-icon rounded mx-auto d-block">
                        <h6 class="mb-md-4 mb-3 d-md-none d-block">
                            <span
                                class="bg-dark border border-dark rounded-circle text-white px-1 py-1 font-weight-bolder">3</span>
                        </h6>
                        <h6 class="mb-4 d-none d-md-block">
                            <span
                                class="bg-dark border border-dark rounded-circle text-white px-3 py-2 font-weight-bolder h5">3</span>
                        </h6>
                        <h5 class="step-title text-uppercase">INSTALLATION</h5>
                        <p class="h5">You can DIY with <span><a href="">our ​easy-peasy guide</a></span>
                        </p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card pl-1 mb-md-5 mb-0 border-0" id="steps">
                        <img src="{{ URL::asset('view/style/images/33968180c9367d1a5d778fdee13e71ff.svg') }}"
                            alt="Install" class="step-icon rounded mx-auto d-block">
                        <h6 class="mb-md-4 mb-3 d-md-none d-block">
                            <span
                                class="bg-dark border border-dark rounded-circle text-white px-1 py-1 font-weight-bolder">4</span>
                        </h6>
                        <h6 class="mb-4 d-none d-md-block">
                            <span
                                class="bg-dark border border-dark rounded-circle text-white px-3 py-2 font-weight-bolder h5">4</span>
                        </h6>
                        <h5 class="step-title text-uppercase">GUARANTEED</h5>
                        <p class="h5">We are always here 24/7 ​whenever you need us, from ​step 1 until you satisfy
                            with
                            ​your new
                            window coverings !</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="committed">
            <div class="container pt-5 pb-5 text-center text-md-left">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <h2 class="custom-title">Committed to sustainability</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-4 col-12 mt-md-5 mt-0 h5">
                            <p class="content">Our made-to-measure, each piece from​Custom & Nooke is personal and
                                unlike ​any other.
                                Inspired by the clean lines, cozy ​feel, and monochromatic palette of a ​modern
                                minimalist home, we ensure every​single piece makes to last</p>
                            <a class="btn btn-primary rounded-pill d-none d-md-inline">FR​EE SWATCHES</a>
                        </div>
                        <div class="col-md-8 col-6">
                            {{-- <img class="image"
                                src="{{ URL::asset('view/style/images/49bff58e2403308511216c20edd05fdf.jpg') }}"
                                alt=""> --}}
                            <iframe class="w-100" height="100%"
                                src="{{ URL::asset('images/placeholder/Download.mp4') }}" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>

                        </div>
                        {{-- <div class="col-md-4 col-6">
                            <img class="image"
                                src="{{ URL::asset('view/style/images/49bff58e2403308511216c20edd05fdf.jpg') }}"
                                alt="">
                        </div> --}}
                        <div class="col-12
                                    text-center d-sm-inline d-md-none mt-4">
                            <a class="btn btn-primary rounded-pill">FR​EE SWATCHES</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Email --}}
        @include('client.mail')

        <section id="client">
            <div class="container-fluid my-md-5 my-2">
                <div class="row">
                    <div class="col-12">
                        <p class="display-4 d-none d-md-inline">Client </br>
                            Testimonials</p>
                        <p class="h2 font-weight-bold d-sm-inline d-md-none">Client
                            Testimonials</p>
                    </div>
                    <div class="col-12 content">
                        <div class="row text-center">
                            @foreach ($clientTestimonials as $value)
                                <div class="col-md-4 col-12">
                                    <img class="w-100" src="{{ route('storages.image', ['url' => $value->pic]) }}"
                                        alt="">
                                    <a href="">{{ $value->title }}</a>
                                    <p>{{ $value->description }}</p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')

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
@endsection
