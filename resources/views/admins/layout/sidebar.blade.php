<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-section">
            <div class="sidebar-user-material">
                <div class="sidebar-section-body">
                    <div class="d-flex">
                        <div class="flex-1">
                            <button type="button"
                                class="btn btn-outline-light border-transparent btn-icon btn-sm rounded-pill">
                                <i class="icon-wrench"></i>
                            </button>
                        </div>
                        <a href="#" class="flex-1 text-center"><img src="{{ asset('images/clipart3643767.png') }}"
                                class="img-fluid rounded-circle shadow-sm" width="80" height="80"
                                alt=""></a>
                        <div class="flex-1 text-right">
                            <button type="button"
                                class="btn btn-outline-light border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                <i class="icon-transmission"></i>
                            </button>

                            <button type="button"
                                class="btn btn-outline-light border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                                <i class="icon-cross2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="text-center">
                        <h6 class="mb-0 text-white text-shadow-dark mt-3">Victoria Baker</h6>
                        <span class="font-size-sm text-white text-shadow-dark">Santa Ana, CA</span>
                    </div>
                </div>

                {{-- <div class="sidebar-user-material-footer">
                    <a href="#user-nav"
                        class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle"
                        data-toggle="collapse"><span>My account</span></a>
                </div> --}}
            </div>

            {{-- <div class="collapse border-bottom" id="user-nav">
                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-user-plus"></i>
                            <span>My profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-coins"></i>
                            <span>My balance</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-comment-discussion"></i>
                            <span>Messages</span>
                            <span class="badge badge-teal badge-pill align-self-center ml-auto">58</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-cog5"></i>
                            <span>Account settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-switch2"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div> --}}
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs mt-1">
                        Main
                    </div> 
                    <i class="icon-menu" title="Main"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route(\App\Models\Category::INDEX) }}" 
                    class="nav-link {{ request()->is('admin/categories') ? 'active' : '' }}">
                        <i class="fa-solid fa-bars"></i>
                        <span>
                            Category
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route(\App\Models\Color::INDEX) }}" 
                    class="nav-link {{ request()->is('admin/colors') ? 'active' : '' }}">
                        <i class="fa-solid fa-palette"></i>
                        <span>
                            Color
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route(\App\Models\OrderItem::INDEX) }}" 
                    class="nav-link {{ request()->is('admin/orders') ? 'active' : '' }}">
                        <i class="fa-solid fa-cart-plus"></i>
                        <span>
                            Item
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" 
                    class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                        <i class="fa-solid fa-person-booth"></i>
                        <span>
                            Product
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('checkout.index') }}" 
                    class="nav-link {{ request()->is('admin/checkouts') ? 'active' : '' }}">
                        <i class="fa-solid fa-cash-register"></i>
                        <span>
                            Checkout
                        </span>
                    </a>
                </li>
                @if (Route::has('posts.index'))
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" 
                    class="nav-link {{ request()->is('admin/posts*') ? 'active' : '' }}">
                        <i class="fa-solid fa-pencil"></i>
                        <span>Post</span>
                    </a>
                </li>
                @endif
                @if (Route::has(\App\Models\Page::INDEX))
                <li class="nav-item">
                    <a href="{{ route(\App\Models\Page::INDEX) }}" 
                    class="nav-link {{ request()->is('admin/pages*') ? 'active' : '' }}">
                        <i class="fa-solid fa-pager"></i>
                        <span>Page</span>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('mail-config.index') }}" 
                    class="nav-link {{ request()->is('admin/mail-config') ? 'active' : '' }}">
                        <i class="fa-solid fa-at"></i>
                        <span>
                            Mail
                        </span>
                    </a>
                </li>

                <li class="nav-item nav-item-submenu {{ request()->is('admin/home/*') ? 'nav-item-open' : '' }}">
                    <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Home</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Home" 
                    style="{{ request()->is('admin/home/*') ? 'display: block;' : '' }}">
                        <li class="nav-item">
                            <a href="{{ route(\App\Models\Logo::INDEX) }}" 
                            class="nav-link {{ request()->is('admin/home/logos') ? 'active' : '' }}">
                                <i class="fa-brands fa-slack"></i>
                                <span>
                                    Logo
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route(\App\Models\Slider::INDEX) }}" 
                            class="nav-link {{ request()->is('admin/home/sliders') ? 'active' : '' }}">
                                <i class="fa-solid fa-image"></i>
                                <span>
                                    Slider
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('producthome.index') }}" 
                            class="nav-link {{ request()->is('admin/home/producthome') ? 'active' : '' }}">
                                <i class="fa-solid fa-heading"></i>
                                <span>
                                    Product Home
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route(\App\Models\ClientTestimonials::INDEX) }}" 
                            class="nav-link {{ request()->is('admin/home/clients') ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i>
                                <span>Client Testimonials</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('headers.index') }}" 
                    class="nav-link {{ request()->is('admin/headers') ? 'active' : '' }}">
                        <i class="fa-solid fa-heading"></i>
                        <span>
                            Header
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('footers.index') }}" 
                    class="nav-link {{ request()->is('admin/footers') ? 'active' : '' }}">
                        <i class="fa-solid fa-font-awesome"></i>
                        <span>
                            Footer
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
