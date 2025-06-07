@extends('client.master')
@section('title', 'Home')

@section('content')
    <main id="content-wrapper" class="main-v2 text-body px-5">
        <section id="introduction-section" class="container-fluid py-2 border-bottom border-dark">
            <div class="row align-items-stretch">
                <div class="col-4 py-4">
                    <div class="row flex-column h-100">
                        <div class="col">
                            <h1><strong>Smart, Stylish Shades Custom-Made for Seattle Living</strong></h1>
                        </div>
                        <div class="col-auto">
                            <div class="px-3 pb-5">
                                <p class="text-justify" style="font-size: 1.2rem">
                                    Say goodbye to showroom markups. Simply, we offer FREE samplings or Free in-home consultation with a 100% 
                                    satisfaction guarantee.
                                </p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="px-3 d-flex flex-column">
                                <button class="btn btn-dark rounded-pill mb-2">Shop now</button>
                                <button class="btn btn-outline-dark rounded-pill">Make Appointment</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row align-items-end">
                        <div class="col-8">
                            <img src="{{ asset('images/home-page/254a880356f340fe7edf90a5117eb200.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col">
                            <img src="{{ asset('images/home-page/836d1b78890b76c6a4c814536837fa18.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div style="height:4rem"></div>

        <section class="container-fluid process-work">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="row border-bottom py-3">
                        <div class="col text-center">
                            <h2><strong>Trusted by your Seattle Neighbors</strong></h2>
                        </div>
                    </div>
                    <div class="row border-bottom py-3">
                        <div class="col-12" type="button" data-toggle="collapse" data-target="#trustedBy_1">
                            <i class="fa-regular fa-star"></i>
                            <strong class="ml-2">Google and Yelp Reviews</strong>
                            <i class="fa-solid fa-chevron-down float-right arrow"></i>
                        </div>
                        <div class="col collapse trusted-by" id="trustedBy_1">
                            <div class="mt-3">
                                <span>
                                    Our happy customers say it best - check out our 5-star reviews on 
                                    Google and Yelp to see why Seattle families trust us.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row border-bottom py-3">
                        <div class="col-12" type="button" data-toggle="collapse" data-target="#trustedBy_2">
                            <i class="fa-solid fa-location-dot"></i>
                            <strong class="ml-2">Locally owned and operated</strong>
                            <i class="fa-solid fa-chevron-down float-right arrow"></i>
                        </div>
                        <div class="col collapse trusted-by" id="trustedBy_2">
                            <div class="mt-3">
                                <span>
                                    Born and raised in the Northwest, we bring local insight, personal care, and fast response to every home.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row border-bottom py-3">
                        <div class="col-12" type="button" data-toggle="collapse" data-target="#trustedBy_3">
                            <i class="fa-solid fa-carrot"></i>
                            <strong class="ml-2">Family owned & Child - safe solutions</strong>
                            <i class="fa-solid fa-chevron-down float-right arrow"></i>
                        </div>
                        <div class="col collapse trusted-by" id="trustedBy_3">
                            <div class="mt-3">
                                <span>
                                    As a family business, we understand what matters. That's why we offer stylish, functional, and child-safe 
                                    window treatments you can feel good about.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row border-bottom py-3">
                        <div class="col-12" type="button" data-toggle="collapse" data-target="#trustedBy_4">
                            <i class="fa-regular fa-heart"></i>
                            <strong class="ml-2">Serviving Greater Seattle area with care since 2023</strong>
                            <i class="fa-solid fa-chevron-down float-right arrow"></i>
                        </div>
                        <div class="col collapse trusted-by" id="trustedBy_4">
                            <div class="mt-3">
                                <span>
                                    From Ballard to Bellevue, we're pround to serve our community with premium shades, blinds, and 
                                    delicated services.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div style="height:7rem"></div>

        <section class="container-fluid py-5 px-4 process-work">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="text-uppercase">Shop by style</h2>
                </div>
                <div class="col text-right">
                    <a href="#!" class="text-dark" style="font-size:1.2rem">View all ⟶</a>
                </div>
            </div>
            <div class="row">
                @if ($shadeCates->count() > 0)
                @foreach ($shadeCates as $shadeCate)
                <div class="col-3">
                    <div class="row mb-4">
                        <div class="col">
                            <a href="{{ route('home.category', ['slug' => $shadeCate->slug]) }}">
                                <img src="{{ route('storages.image', ['url' => $shadeCate->image]) }}" alt="" 
                                class="img-fluid" style="aspect-ratio:5/6;object-fit:cover" width="100%">
                            </a>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <a href="{{ route('home.category', ['slug' => $shadeCate->slug]) }}" class="text-dark">
                                <h3>
                                    <span>{{ $shadeCate->name }} </span>
                                    <span class="d-inline-block" style="transform: translateY(20%)">⟶</span>
                                </h3>
                            </a>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col" style="overflow-wrap: break-word">
                            <span>{{ $shadeCate->description }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    
                @endif
            </div>
        </section>

        <div style="height:6rem"></div>

        <section class="container-fluid px-4 process-work">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="text-uppercase">Our bestsellers</h2>
                </div>
                <div class="col text-right">
                    <a href="{{ route('home.category') }}" class="text-dark" style="font-size:1.2rem">View all ⟶</a>
                </div>
            </div>
            <div class="row">
                @if ($lisporudct->count() > 0)
                @foreach ($lisporudct as $product)
                <div class="col-3">
                    <div class="row mb-2 flex-column h-100">
                        <div class="col">
                            <div class="mb-4 position-relative">
                                <a href="{{ route('home.products', $product->slug) }}">
                                    <img src="{{ route('storages.image', ['url' => $product->pic]) }}" alt="" 
                                    class="img-fluid" style="aspect-ratio:5/6;object-fit:cover" width="100%">
                                </a>
                                @if ($product->fromOLD)
                                <div class="rounded-pill px-3 py-2 position-absolute badge-dark" style="top:10px;left:10px">
                                    <strong>SALE</strong>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <a href="{{ route('home.products', $product->slug) }}" class="text-dark">
                                <h5 class="text-uppercase">{{ $product->name }}</h5>
                            </a>
                        </div>
                        <div class="col-auto">
                            <p>
                                <a style="font-size:1.5rem">
                                    From 
                                    @if ($product->fromOLD)
                                    <del class="text-muted">${{ $product->fromOLD }} </del>
                                    @endif
                                </a>
                                <span style="font-size:1.7rem">
                                    ${{ $product->from ?? 0 }} 
                                </span>
                                <span style="font-size:1.2rem">
                                    / Square Ft.
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    
                @endif
            </div>
        </section>

        <div style="height:10rem"></div>

        @if ($clientTestimonials->count() > 0)
        <section class="container-fluid process-work">
            <div class="row mb-5">
                <div class="col-7 border-right border-dark pb-3">
                    <div id="clientCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($clientTestimonials as $client)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}"
                                data-description="{{ $client->description }}" data-title="{{ $client->title }}">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{ route('storages.image', ['url' => $client->pic]) }}" alt="" 
                                        height="600" width="100%" style="object-fit:cover">
                                    </div>
                                    <div class="col-6">
                                        <img src="{{ route('storages.image', ['url' => '']) }}" alt="" 
                                        height="600" width="100%" style="object-fit:cover">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-5 d-flex flex-column justify-content-center px-5" style="font-size:1.5rem">
                    <div class="row mb-5">
                        <div class="col">
                            <p class="font-italic client-description">
                                “{{ $clientTestimonials->first()->description }}”
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <span class="client-title">_{{ $clientTestimonials->first()->title }}_</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    @foreach ($clientTestimonials as $client)
                    <i class="fa-solid {{ $loop->first ? 'fa-circle-dot' : 'fa-circle' }} {{ !$loop->last ? 'mr-4' : '' }}" 
                        data-slide-to="{{ $loop->index }}" data-target="#clientCarousel" type="button"></i>
                    @endforeach
                </div>
            </div>
        </section>

        <div style="height:10rem"></div>
        @endif

        <section class="container-fluid px-4 process-work" id="appointment">
            <div class="row mb-3">
                <div class="col-4 border-right border-dark py-5">
                    <div class="row h-100 flex-column">
                        <div class="col">
                            <h1>From residential to comercical design, we have you covered.</h1>
                        </div>
                        <div class="col-auto mb-3">
                            <p class="text-justify" style="font-size: 1.2rem">
                                Booking a consultation is your first step toward creating a captivating and harmonious 
                                environment that reflects your style and aspirations.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4 border-right border-dark py-5">
                    <div class="row mb-5">
                        <div class="col text-center">
                            <h3>Free in-house consultation</h3>
                            <h5>Contact form</h5>
                        </div>
                    </div>
                    <form action="{{ route('send-email') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="row mb-4">
                            <div class="col-5">
                                <label>Name</label>
                                <input type="text" name="fullname" class="form-control" required>
                            </div>
                            <div class="col-7">
                                <label>Phone Number</label>
                                <input type="number" name="phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label>Email *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label>Message</label>
                                <textarea type="text" name="message" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-dark rounded-pill py-2 px-5">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4 pb-5">
                    <img src="{{ asset('images/home-page/29fc9f776904c959a7e128078706f3ce.jpg') }}" alt="" 
                    height="600" style="object-fit:cover">
                </div>
            </div>
        </section>

        <div style="height:8rem"></div>

        <section class="container-fluid process-work" style="height:460px;background-position:center;
        background-image:url({{ asset('images/home-page/ba073c2c7ed563c5b49144233828210a.jpg') }});">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-6 text-center p-5" style="background-color: rgba(68, 27, 27, 0.5)">
                    <span class="text-white" style="font-size: 1.4rem">
                        “We believe in being transparent about our pricing. If you 
                        come across a lower price for a similar product, simply 
                        share the details with us. We’ll gladly match it.“
                    </span>
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
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

    <script>
        function setEqualHeight(elements) {
            var heights = elements.map(function() {return $(this).height();}).get();
            var max_height = Math.max.apply(null, heights);

            elements.height(max_height);
        }

        $(document).ready(function() {
            setEqualHeight($('.products .product-info'));
            // setEqualHeight($('.client-img'));
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#clientCarousel').on('slide.bs.carousel', function(e) {
                let slide = $(e.relatedTarget);
                let title = slide.attr('data-title');
                let description = slide.attr('data-description');
                let index = e.to;

                $('.client-description').text(`"${description}"`);
                $('.client-title').text(`_${title}_`);

                $('i.fa-circle-dot[data-target="#clientCarousel"]').removeClass('fa-circle-dot').addClass('fa-circle');
                $(`i[data-target="#clientCarousel"][data-slide-to="${index}"]`).removeClass('fa-circle').addClass('fa-circle-dot');
            });

            $('.trusted-by').on('show.bs.collapse', function(e) {
                let id = e.currentTarget.id;
                $(`[data-target="#${id}"] .arrow`).removeClass('fa-chevron-down').addClass('fa-chevron-up');
            });

            $('.trusted-by').on('hide.bs.collapse', function(e) {
                let id = e.currentTarget.id;
                $(`[data-target="#${id}"] .arrow`).removeClass('fa-chevron-up').addClass('fa-chevron-down');
            });
        });
    </script>
@endsection
