<div class="line p-0 m-0">
    <div class="align-items-start">
        <div class="d-flex justify-content-between">
            <div class="col-12">
                <div class="row ms-1">
                    <p class="mx-4 my-3 h6 text-uppercase desplay-3" style="font-family: YACkoA9eHeY-0;">
                        <span id="" style="color:#ffffff; white-space:pre-wrap;">{{ $header->title1 }}</span><br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="name-logo row">
        <div class="logodiv col-12 p-0 text-center d-flex justify-content-center align-items-end">
            <a
                href="{{ URL::route('home') }}" style="display: flex; align-items: center; text-decoration: none; color: black;">
                <img class="logo" src="{{ URL::asset('view/style/images/Logo-1.png') }}" alt="">
                <div style="margin-left: 10px; margin-bottom: 0;">
                    <p class="name h2" style=" margin-bottom: 0;">
                        <span class="font-weight-bold text-1" style="font-family: YAFcfpZDFTo-0;">unam</span>
                        <span class="text-2" style="">shades</span>
                    </p>
                </div>
            </a>
            <div class="rounded-circle">
            </div>
            <div class="icon">
                <a class="h3 position-absolute " href="" style="right: 50px; top: 50px"><i
                        class="fa-solid fa-magnifying-glass text-body"></i></a>
                <a class="h3 position-absolute " href="cart.html" style="right: 10px; top: 50px"><i
                        class="fa-solid fa-cart-shopping text-body"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="d-none d-md-block">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                Shades <i class="fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu custom-dropdown">
                                <a class="dropdown-item" href="catergory.html">Horizontal Sheer</a>
                                <a class="dropdown-item" href="catergory.html">Vertical Sheer</a>
                                <a class="dropdown-item" href="catergory.html">Cellular</a>
                                <a class="dropdown-item" href="catergory.html">Roller</a>
                                <a class="dropdown-item" href="catergory.html">Roman</a>
                                <a class="dropdown-item" href="catergory.html">Combi Roman</a>
                            </div>
                        </li> --}}
                        @foreach ($cates as $cate)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button"
                                    data-toggle="dropdown" aria-expanded="false">
                                    {{ $cate->name }}
                                    @if ($cate->slug != 'how-to')
                                        <i class="fas fa-angle-down"></i>
                                    @endif
                                </a>
                                @if ($cate->slug != 'how-to')
                                    <div class="dropdown-menu custom-dropdown">
                                        @include('client.partials.catergoryChild', [
                                            'parentId' => $cate->id,
                                        ])
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
        <div class="d-md-none d-block">
            <div class="float-left fixed-top ">
                <div class="mt-5">
                    <a class="pull-bs-canvas-left text-decoration-none h3 btn btn-light border" href="#">
                        <i class="fa-solid fa-align-left"></i>
                    </a>
                </div>
            </div>
            <div class="bs-canvas bs-canvas-left position-fixed bg-light h-100">
                <header class="bs-canvas-header p-3 bg-white">
                    <div class="name-logo row d-flex justify-content-start">
                        <div class="logo col-12 p-0 text-center d-flex justify-content-center align-items-end"
                            style="height: 50px;">
                            <img class="logo" src="{{ URL::asset('view/style/images/Logo-1.png') }}" alt="">
                            <div style="margin-left: 10px; margin-bottom: 0;">
                                <p class="name h2" style=" margin-bottom: 0;">
                                    <span class="font-weight-bold text-1"
                                        style="font-family: YAFcfpZDFTo-0;">unam</span>
                                    <span class="text-2" style="">shades</span>
                                </p>
                            </div>
                        </div>
                        <!-- <button type="button" class="bs-canvas-close close" aria-label="Close"><span
                                aria-hidden="true" class="text-body">&times;</span></button> -->
                    </div>
                </header>
                <div class="bs-canvas-content">
                    @foreach ($cates as $cate)
                        <div class="dropdown border-bottom border-dark">
                            <button class="btn dropdown-toggle w-100 text-left text-uppercase" type="button"
                                data-toggle="dropdown" aria-expanded="false">
                                {{ $cate->name }}
                                @if ($cate->slug != 'how-to')
                                    <i class="fas fa-angle-down float-right mt-1"></i>
                                @endif
                            </button>
                            @if ($cate->slug != 'how-to')
                                <div class="dropdown-menu w-100">
                                    @include('client.partials.catergoryChild', [
                                        'parentId' => $cate->id,
                                    ])
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
