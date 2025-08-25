@if (isset($header) && $header->title1 != '')
<div class="line p-0 m-0">
    <div class="align-items-start">
        <div class="d-flex justify-content-between">
            <div class="col-12">
                <div class="row ms-1">
                    <span class="mx-4 my-2 text-uppercase desplay-3" style="font-size:14px">
                        <span style="color:#ffffff; white-space:pre-wrap;">{{ $header->title1 }}</span><br>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="container-fluid">
    <div class="name-logo row">
        <div class="logodiv col text-left text-sm-center position-relative">
            <a href="{{ URL::route('home') }}" class="d-inline-block">
                {{-- @dd($logoHeader) --}}
                @if ($logoHeader && $logoHeader->pic != 'null')
                    <img src="{{ route('storages.image', ['url' => $logoHeader->pic]) }}" class="logo">
                @else
                    <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" class="logo">
                @endif

                {{-- <img class="logo" src="{{ URL::asset('view/style/images/Logo-1.png') }}" alt=""> --}}
                {{-- <div style="margin-left: 10px; margin-bottom: 0;">
                    <p class="name h2" style=" margin-bottom: 0;">
                        <span class="font-weight-bold text-1" style="font-family: YAFcfpZDFTo-0;">unam</span>
                        <span class="text-2" style="">shades</span>
                    </p>
                </div> --}}
            </a>
            {{-- <div class="rounded-circle">
            </div> --}}
            <div class="icon position-absolute d-flex flex-row" style="right:10px; bottom:0;gap:1rem">
                <a class="h3" href=""  data-toggle="modal" data-target="#exampleModal">
                    <i class="fa-solid fa-magnifying-glass text-body"></i>
                </a>
                <a class="h3" href="{{ route('shopping-cart') }}">
                    <i class="fa-solid fa-cart-shopping text-body"></i>
                </a>
                @auth('web')
                <a class="h3" href="{{ route('my-checkouts') }}">
                    <i class="fa-solid fa-file-invoice-dollar text-body"></i>
                </a>
                <a class="h3" href="javascript:void" onclick="document.getElementById('logoutForm').submit()">
                    <i class="fa-solid fa-right-from-bracket text-body"></i>
                </a>
                <form action="{{ route('account.logout') }}" id="logoutForm" class="d-none" method="POST">
                    @method('post')
                    @csrf
                </form>
                @else
                <a class="h3" href="" data-toggle="modal" data-target="#loginModal">
                    <i class="fa-solid fa-circle-user text-body"></i>
                </a>
                @endauth
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-lg-center border-top border-bottom border-dark">
        <div class="d-none d-md-block">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <span class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </span>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        @foreach ($cates as $cate)
                            <li class="nav-item dropdown" id="menu-{{ $cate->slug }}">
                                <a class="nav-link dropdown-toggle text-capitalize text-body"
                                    href="{{ in_array($cate->id, $pages) ? URL::route('home.pages', $cate->slug) : '#!' }}"
                                    role="button" data-toggle="dropdown" aria-expanded="false">
                                    {{ $cate->name }}
                                    {{-- @if ($cate->slug != 'how-to')
                                        <i class="fas fa-angle-down"></i>
                                    @endif --}}
                                </a>
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
                            @if ($logoHeader)
                                @if ($logoHeader->pic != 'null')
                                    <img src="{{ route('storages.image', ['url' => $logoHeader->pic]) }}"
                                        class="logo">
                                @else
                                    <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" class="logo">
                                @endif
                            @else
                                <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" class="logo">
                            @endif
                            {{-- <img class="logo" src="{{ URL::asset('view/style/images/Logo-1.png') }}" alt="">
                            <div style="margin-left: 10px; margin-bottom: 0;">
                                <p class="name h2" style=" margin-bottom: 0;">
                                    <span class="font-weight-bold text-1"
                                        style="font-family: YAFcfpZDFTo-0;">unam</span>
                                    <span class="text-2" style="">shades</span>
                                </p>
                            </div> --}}
                        </div>
                        <!-- <button type="button" class="bs-canvas-close close" aria-label="Close"><span
                                aria-hidden="true" class="text-body">&times;</span></button> -->
                    </div>
                </header>
                <div class="bs-canvas-content" id="mobileMenu">
                    @foreach ($cates as $cate)
                        <div class="border-bottom border-dark">
                            <a href="#category_{{ $loop->iteration }}" class="btn w-100 text-left text-capitalize shadow-none" 
                                data-toggle="collapse">
                                {{ $cate->name }}
                                @if ($cate->slug != 'how-to')
                                    <i class="fas fa-angle-down float-right mt-1"></i>
                                @endif
                            </a>
                            @if ($cate->slug != 'how-to')
                            <div class="collapse w-100 pl-4 pt-2 border-top border-dark" id="category_{{ $loop->iteration }}" 
                                data-parent="#mobileMenu">
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


{{-- Child Computer --}}
@foreach ($cates as $cate)
    @if ($cate->slug != 'how-to')
        <div class="display menu-dropdown" id="{{ $cate->slug }}-content">
            <div class="containers" id="containers">
                <div class="menu">
                    @if (in_array($cate->id, $pages))
                        <h2 class="text-uppercase"><a class="text-black"
                                href="{{ URL::route('home.pages', $cate->slug) }}">{{ $cate->name }}</a></h2>
                    @else
                        <h2 class="text-uppercase text-black">{{ $cate->name }}</h2>
                    @endif
                    <ul>
                        @include('client.partials.catergoryChild', [
                            'parentId' => $cate->id,
                        ])
                    </ul>
                </div>

                <div class="content">
                    @if ($cate->image)
                        <img src="{{ route('storages.image', ['url' => $cate->image]) }}"
                            alt="{{ $cate->description }}" style="height:140px;object-fit:cover">
                    @else
                        <img src="{{ URL::asset('images/placeholder/placeholder.png') }}" alt="Erro">
                    @endif
                    <p>{{ $cate->content }}</p>
                    {{-- <a href="#">SHOP THE NEW COLLECTION</a> --}}
                </div>
            </div>
        </div>
    @endif
@endforeach

@section('script')
@endsection
