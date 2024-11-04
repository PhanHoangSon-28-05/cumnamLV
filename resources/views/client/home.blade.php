@extends('client.master')
@section('title', 'Home')

@section('content')
    <main id="content-wrapper" class="main-v2 text-body">
        <section id="introduction-section" class="container-fluid mt-2">
            <div class="row">
                <div class="col-6 pr-0 pr-md-2">
                    <img src="{{ URL::asset('view/style/images/hinh-1.jpg') }}" class="w-100 rounded" alt="Top Image">
                    <h3 class="">CUSTOM-MADE SHADES & BLINDS</h3>
                    <p class="">HIGH QUALITY WITHOUT HEFTY PRICE TAGS</p>
                    <a class="btn btn-primary rounded-pill">GET STARTED</a>
                </div>
                <div class="col-6 image-right">
                    <img src="{{ URL::asset('view/style/images/hinh-2.png') }}" class="w-100 rounded" alt="Right Image">
                </div>
            </div>
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
                <!-- <div class="col-4">
                                    <div class="card pl-1 mb-md-5 mb-sm-1 border-0">
                                        <div class="d-flex d-md-block">
                                            <img src="{{ URL::asset('view/style/images/32acce8ca1f734b86113d04540b96eb8.svg') }}" alt="Measure"
                                                class="step-icon rounded w-50 d-sm-block d-md-none mr-2">
                                            <img src="{{ URL::asset('view/style/images/32acce8ca1f734b86113d04540b96eb8.svg') }}" alt="Measure"
                                                class="step-icon rounded d-none d-md-block mr-2">
                                            <div>
                                                <h5 class="step-title text-uppercase mb-0">BEST PRICING</h5>
                                                <p class="mt-1">"Meals with my family are always extra special because of the beautiful
                                                    plates I got from Custom & Nooke."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card pl-1 mb-md-5 mb-1 border-0">
                                        <div class="d-flex d-md-block">
                                            <img src="{{ URL::asset('view/style/images/03bd4576649ef1d56e4816d333f80cfc.svg') }}" alt="Measure"
                                                class="step-icon rounded w-50 d-sm-block d-md-none mr-2">
                                            <img src="{{ URL::asset('view/style/images/03bd4576649ef1d56e4816d333f80cfc.svg') }}" alt="Measure"
                                                class="step-icon rounded d-none d-md-block mr-2">
                                            <div class="">
                                                <h5 class="step-title text-uppercase">PERFECT FIT</h5>
                                                <p>"Very pleased with my new sofa--the quality is great, it's comfortable, and elevates
                                                    the
                                                    look
                                                    of my home."
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card pl-1 mb-md-5 mb-1 border-0">
                                        <div class="d-flex d-md-block">
                                            <img src="{{ URL::asset('view/style/images/7e38d417227a447a118273e451275720.svg') }}" alt="Measure"
                                                class="step-icon rounded w-50 d-sm-block d-md-none mr-2">
                                            <img src="{{ URL::asset('view/style/images/7e38d417227a447a118273e451275720.svg') }}" alt="Measure"
                                                class="step-icon rounded d-none d-md-block mr-2">
                                            <div class="">
                                                <h5 class="step-title text-uppercase">SATISFACTIO​N GUARENTEE</h5>
                                                <p>"I love how timeless my decor are. I just need to move things around to update the
                                                    look
                                                    of my
                                                    space."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
            </div>
            </div>
        </section>
        <section class="container-fluid my-md-5 mt-0 products" style="background-color: #EFEFEF;">
            <div class="container-product">
                <div class="px-md-5 px-sm-0">
                    <h1 class="text-center text-uppercase">OUR PREMIER PRODUCTS</h1>
                    <p class="text-center">WCustom Made , Discover the story behind our premium materials, crafted with
                        care ​and precision. Embrace the artistry of European, Korean, and Turkish fabrics that ​define
                        luxury. Your window to elegance awaits.
                    </p>
                    <div class="shop-now">
                        <a class="text-white bg-dark border border-dark" href="#">LEARN​MORE</a>
                    </div>
                </div>
                <div class=" d-none d-sm-block">
                    <div class="row">
                        <div class="col-3 my-1 ">
                            <a href="product.html">
                                <div class="card">
                                    <img id="productImage1"
                                        src="{{ URL::asset('view/style/images/Wooden Shade/Artboard 64@4x.jpg') }}"
                                        class="card-img-top" alt="Oakley">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="color-dot" style="background-color: #d2b48c;"
                                                onmouseover="changeImage('productImage1', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 64@4x.jpg') }}">
                                            </div>
                                            <div class="color-dot" style="background-color: #f5f5dc;"
                                                onmouseover="changeImage('productImage1', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 47@4x.png') }}">
                                            </div>
                                            <div class="color-dot" style="background-color: #faf0e6;"
                                                onmouseover="changeImage('productImage1', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 47@4x.jpg') }}">
                                            </div>
                                            <div class="color-dot" style="background-color: #fff5ee;"
                                                onmouseover="changeImage('productImage1', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 65@4x.jpg') }}">
                                            </div>
                                            <p><a href="#" class="text-decoration-none text-dark">+ 9 more</a>
                                            </p>
                                        </div>
                                        <h5 class="card-title">
                                            <span class="float-left">Wooden Shade</span>
                                            <span class="badge badge-discount float-right text-uppercase">10%
                                                OFF</span>
                                        </h5>
                                        <br>
                                        <p class="card-text">Cross Linen Texture Curtains</p>
                                        <p class="card-text card-price"><small class="text-muted">From
                                                <span class="font-weight-bolder h5 text-danger">$110</span>
                                                <del>$150</del></small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3  my-1">
                            <a href="product.html">
                                <div class="card">
                                    <img id="productImage2"
                                        src="{{ URL::asset('view/style/images/Zebra/Artboard 169@4x.jpg') }}"
                                        class="card-img-top" alt="Oakley">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="color-dot" style="background-color: #d2b48c;"
                                                onmouseover="changeImage('productImage2', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 64@4x.jpg') }}">
                                            </div>
                                            <div class="color-dot" style="background-color: #f5f5dc;"
                                                onmouseover="changeImage('productImage2', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 47@4x.png') }}">
                                            </div>
                                            <div class="color-dot" style="background-color: #faf0e6;"
                                                onmouseover="changeImage('productImage2', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 47@4x.jpg') }}">
                                            </div>
                                            <div class="color-dot" style="background-color: #fff5ee;"
                                                onmouseover="changeImage('productImage2', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 65@4x.jpg') }}">
                                            </div>
                                            <p><a href="#" class="text-decoration-none text-dark">+ 9 more</a>
                                            </p>
                                        </div>
                                        <h5 class="card-title">
                                            <span class="float-left">Zebra </span>
                                            <span class="badge badge-discount float-right text-uppercase">10%
                                                OFF</span>
                                        </h5>
                                        </br>
                                        <p class="card-text">Cross Linen Texture Curtains</p>
                                        <p class="card-text card-price"><small class="text-muted">From
                                                <span class="font-weight-bolder h5 text-danger">$110</span>
                                                <del>$150</del></small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3 my-1">
                            <a href="product.html">
                                <div class="card">
                                    <img src="{{ URL::asset('view/style/images/Roman shade/Artboard 78@4x.jpg') }}"
                                        class="card-img-top" alt="Oakley">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="color-dot" style="background-color: #d2b48c;">
                                            </div>
                                            <div class="color-dot" style="background-color: #f5f5dc;">
                                            </div>
                                            <div class="color-dot" style="background-color: #faf0e6;">
                                            </div>
                                            <div class="color-dot" style="background-color: #fff5ee;">
                                            </div>
                                            <p><a href="#" class="text-decoration-none text-dark">+ 9 more</a>
                                            </p>
                                        </div>
                                        <h5 class="card-title">
                                            <span class="float-left">Roman shade </span>
                                            <span class="badge badge-discount float-right text-uppercase">10%
                                                OFF</span>
                                        </h5>
                                        </br>
                                        <p class="card-text">Cross Linen Texture Curtains</p>
                                        <p class="card-text card-price"><small class="text-muted">From
                                                <span class="font-weight-bolder h5 text-danger">$110</span>
                                                <del>$150</del></small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3  my-1">
                            <a href="product.html">
                                <div class="card">
                                    <img src="{{ URL::asset('view/style/images/Horizontal Sheer/7FF04775-82ED-4EF2-ABF1-462534813D96.JPG') }}"
                                        class="card-img-top" alt="Oakley">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="color-dot" style="background-color: #d2b48c;">
                                            </div>
                                            <div class="color-dot" style="background-color: #f5f5dc;">
                                            </div>
                                            <div class="color-dot" style="background-color: #faf0e6;">
                                            </div>
                                            <div class="color-dot" style="background-color: #fff5ee;">
                                            </div>
                                            <p><a href="#" class="text-decoration-none text-dark">+ 9 more</a>
                                            </p>
                                        </div>
                                        <h5 class="card-title">
                                            <span class="float-left">Horizontal sheer</span>
                                            <span class="badge badge-discount float-right text-uppercase">10%
                                                OFF</span>
                                        </h5>
                                        </br>
                                        <p class="card-text">Cross Linen Texture Curtains</p>
                                        <p class="card-text card-price"><small class="text-muted">From
                                                <span class="font-weight-bolder h5 text-danger">$110</span>
                                                <del>$150</del></small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" d-md-none d-block">
                    <div class="row">
                        <div class="flipster">

                            <ul class="flip-items">
                                <li class="col-10">
                                    <a href="product.html">
                                        <div class="card">
                                            <img id="productImage1"
                                                src="{{ URL::asset('view/style/images/Wooden Shade/Artboard 64@4x.jpg') }}"
                                                class="card-img-top" alt="Oakley">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="color-dot" style="background-color: #d2b48c;"
                                                        onmouseover="changeImage('productImage1', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 64@4x.jpg') }}">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #f5f5dc;"
                                                        onmouseover="changeImage('productImage1', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 47@4x.png') }}">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #faf0e6;"
                                                        onmouseover="changeImage('productImage1', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 47@4x.jpg') }}">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #fff5ee;"
                                                        onmouseover="changeImage('productImage1', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 65@4x.jpg') }}">
                                                    </div>
                                                    <p><a href="#" class="text-decoration-none text-dark">+ 9
                                                            more</a>
                                                    </p>
                                                </div>
                                                <h5 class="card-title">
                                                    <span class="float-left">Wooden Shade</span>
                                                    <span class="badge badge-discount float-right text-uppercase">10%
                                                        OFF</span>
                                                </h5>
                                                <br>
                                                <p class="card-text">Cross Linen Texture Curtains</p>
                                                <p class="card-text card-price"><small class="text-muted">From
                                                        <span class="font-weight-bolder h5 text-danger">$110</span>
                                                        <del>$150</del></small></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="col-10">
                                    <a href="product.html">
                                        <div class="card">
                                            <img id="productImage2"
                                                src="{{ URL::asset('view/style/images/Zebra/Artboard 169@4x.jpg') }}"
                                                class="card-img-top" alt="Oakley">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="color-dot" style="background-color: #d2b48c;"
                                                        onmouseover="changeImage('productImage2', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 64@4x.jpg') }}">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #f5f5dc;"
                                                        onmouseover="changeImage('productImage2', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 47@4x.png') }}">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #faf0e6;"
                                                        onmouseover="changeImage('productImage2', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 47@4x.jpg') }}">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #fff5ee;"
                                                        onmouseover="changeImage('productImage2', '{{ URL::asset('view/style/images/Wooden Shade/Artboard 65@4x.jpg') }}">
                                                    </div>
                                                    <p><a href="#" class="text-decoration-none text-dark">+ 9
                                                            more</a>
                                                    </p>
                                                </div>
                                                <h5 class="card-title">
                                                    <span class="float-left">Zebra </span>
                                                    <span class="badge badge-discount float-right text-uppercase">10%
                                                        OFF</span>
                                                </h5>
                                                </br>
                                                <p class="card-text">Cross Linen Texture Curtains</p>
                                                <p class="card-text card-price"><small class="text-muted">From
                                                        <span class="font-weight-bolder h5 text-danger">$110</span>
                                                        <del>$150</del></small></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="col-10">
                                    <a href="product.html">
                                        <div class="card">
                                            <img src="{{ URL::asset('view/style/images/Roman shade/Artboard 78@4x.jpg') }}"
                                                class="card-img-top" alt="Oakley">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="color-dot" style="background-color: #d2b48c;">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #f5f5dc;">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #faf0e6;">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #fff5ee;">
                                                    </div>
                                                    <p><a href="#" class="text-decoration-none text-dark">+ 9
                                                            more</a>
                                                    </p>
                                                </div>
                                                <h5 class="card-title">
                                                    <span class="float-left">Roman shade </span>
                                                    <span class="badge badge-discount float-right text-uppercase">10%
                                                        OFF</span>
                                                </h5>
                                                </br>
                                                <p class="card-text">Cross Linen Texture Curtains</p>
                                                <p class="card-text card-price"><small class="text-muted">From
                                                        <span class="font-weight-bolder h5 text-danger">$110</span>
                                                        <del>$150</del></small></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="col-10">
                                    <a href="product.html">
                                        <div class="card">
                                            <img src="{{ URL::asset('view/style/images/Horizontal Sheer/7FF04775-82ED-4EF2-ABF1-462534813D96.JPG') }}"
                                                class="card-img-top" alt="Oakley">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="color-dot" style="background-color: #d2b48c;">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #f5f5dc;">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #faf0e6;">
                                                    </div>
                                                    <div class="color-dot" style="background-color: #fff5ee;">
                                                    </div>
                                                    <p><a href="#" class="text-decoration-none text-dark">+ 9
                                                            more</a>
                                                    </p>
                                                </div>
                                                <h5 class="card-title">
                                                    <span class="float-left">Horizontal sheer</span>
                                                    <span class="badge badge-discount float-right text-uppercase">10%
                                                        OFF</span>
                                                </h5>
                                                </br>
                                                <p class="card-text">Cross Linen Texture Curtains</p>
                                                <p class="card-text card-price"><small class="text-muted">From
                                                        <span class="font-weight-bolder h5 text-danger">$110</span>
                                                        <del>$150</del></small></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
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
                        <div class="col-md-4 col-6">
                            <img class="image"
                                src="{{ URL::asset('view/style/images/49bff58e2403308511216c20edd05fdf.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-md-4 col-6">
                            <img class="image"
                                src="{{ URL::asset('view/style/images/49bff58e2403308511216c20edd05fdf.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-12 text-center d-sm-inline d-md-none mt-4">
                            <a class="btn btn-primary rounded-pill">FR​EE SWATCHES</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="appointment">
            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <img src="{{ URL::asset('view/style/images/hinh-3.jpg') }}" alt="">
                    </div>
                    <div class="col-md-6 col-12">
                        <h3 class="font-weight-bold text-center h1">Free in-home appointment</h3>
                        <p class="text-center">Meet our guys to explore our collections, fabrics and color ​options</p>
                        <div class="input">
                            <label for="">Full name (Required)</label>
                            <input type="text" name="fullname">
                        </div>
                        <div class="input">
                            <label for="">Email (required)</label>
                            <input type="email" name="email">
                        </div>
                        <div class="input">
                            <label for="">Message</label>
                            <input class="message" type="text" name="message">
                        </div>
                        <div class="send text-center">
                            <a class="btn btn-primary rounded-pill mt-md-5 mt-2" href="">SEND</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                            <div class="col-md-4 col-12">
                                <img class="w-100"
                                    src="{{ URL::asset('view/style/images/8dd485f67923754359fc09a804fd2eef.jpg') }}"
                                    alt="">
                                <a href="">Al​bert & Freya</a>
                                <p>A Residential in Seattle</p>
                            </div>
                            <div class="col-md-4 col-12">
                                <img class="w-100"
                                    src="{{ URL::asset('view/style/images/71998795ea2bfbb8d15943390cf27ff5.jpg') }}"
                                    alt="">
                                <a href="">THE Pla​ce</a>
                                <p>Design for a boutique hotel</p>
                            </div>
                            <div class="col-md-4 col-12">
                                <img class="w-100"
                                    src="{{ URL::asset('view/style/images/d3dca3a1de3cf228332f65a68aeefbc5.jpg') }}"
                                    alt="">
                                <a href="">Frucinni</a>
                                <p>Design for a restaurant and bar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
