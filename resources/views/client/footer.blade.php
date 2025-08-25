<div class="container-fluid">
    <div class="row">
        <div class="col-md col-12 border-sm-right border-dark pt-5 pb-4">
            <div class="row flex-column h-100">
                <div class="col pl-5">
                    <ul class="text-uppercase" style="font-size:1.2rem">
                        <li>
                            <a class="text-body" href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a class="text-body" href="{{ route('home.category-all') }}">
                                Shop
                            </a>
                        </li>
                        <li>
                            <a class="text-body" href="{{ route('home.category-post', ['slug' => 'contact-us']) }}">
                                Contact us
                            </a>
                        </li>
                        <li>
                            <a class="text-body" href="{{ route('home.category-post', ['slug' => 'our-story']) }}">
                                About us
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <span class="text-muted">{{ $siteConfigs->copyright ?? '' }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-12 border-sm-right border-dark pt-5 pb-4">
            <div class="row mb-3">
                <div class="col text-center text-uppercase" style="font-size:1.2rem">
                    <span>Available Hours (Pacific Time):</span> <br>
                    <span>Mon-Fri: 10:30 PM-6:30 PM</span> <br>
                    <span>Sat-Sun: 10:30 PM-5:30 PM</span>
                </div>
            </div>
            @if ($siteConfigs && $siteConfigs->email)
            <div class="row mb-3">
                <div class="col text-center">
                    <span>Email us:</span> <br>
                    <a href="mailto:{{ $siteConfigs->email }}" class="footer-link">{{ $siteConfigs->email ?? '' }}</a>
                </div>
            </div>
            @endif
            @if ($siteConfigs && $siteConfigs->phone)
            <div class="row mb-3">
                <div class="col text-center">
                    <span>Call us:</span> <br>
                    <a href="#!" class="footer-link">{{ $siteConfigs->phone ?? '' }}</a>
                </div>
            </div>
            @endif
            @if ($siteConfigs && $siteConfigs->address)
            <div class="row mb-3">
                <div class="col text-center">
                    <span>Address:</span> <br>
                    <span>{{ $siteConfigs->address ?? '' }}</span>
                </div>
            </div>
            @endif
        </div>
        <div class="col-md col-12 pt-5 pb-4">
            <div class="row flex-column">
                <div class="col-auto pl-sm-5">
                    <h5 class="text-uppercase font-weight-bold">{{ $footer->title3 }}</h5>
                    <p class="">{{ $footer->content31 }}</p>
                </div>
                <div class="col pl-sm-5">
                    <div class="row flex-row flex-lg-row flex-md-column">
                        <div class="col mb-0 mb-lg-0 mb-md-2">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-dark text-uppercase h-100 btn-block">Sign up</button>
                        </div>
                    </div>
                </div>
                <div class="col-auto text-right">

                </div>
            </div>
        </div>
    </div>
</div>
