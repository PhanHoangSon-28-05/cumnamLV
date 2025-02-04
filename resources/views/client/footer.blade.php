<div class="container-fluid my-md-5 mt-2">
    <div class="row">
        <div class="col-md-4 col-12">
            <h4 class="text-uppercase">{{ $footer->title1 }}</h4>
            <p class="text-uppercase mb-0">{{ $footer->content11 }}</p>
            <p class="text-uppercase mb-0">{{ $footer->content12 }}</p>
            <p class="text-uppercase mb-0">{{ $footer->content13 }}</p>
            <p class="text-uppercase mb-0">{{ $footer->content14 }}</p>
        </div>
        <div class="col-md-4 col-12 connect">
            <h4 class="text-uppercase">{{ $footer->title2 }}</h4>
            <a href="{{ $footer->content21 }}" class="text-uppercase"><i class="fa-solid fa-camera-retro"></i></a>
            <a href="{{ $footer->content22 }}" class="text-uppercase"><i class="fa-solid fa-phone"></i></a>
            <a href="{{ $footer->content23 }}" class="text-uppercase"><i
                    class="fa-brands fa-facebook-messenger"></i></a>
        </div>
        <div class="col-md-4 col-12">
            <h4 class="text-uppercase">{{ $footer->title3 }}</h4>
            <p class="text-uppercase">{{ $footer->content31 }}</p>
            <div class="mt-md-5 mt-2">
                <input type="text">
                <a href="" class="btn text-uppercase mt-1">Sing up</a>
            </div>
        </div>
    </div>
</div>
