<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Header;
use App\Models\Category;
use App\Models\OrderItem;
use App\Mail\CheckoutMail;
use App\Models\SiteConfig;
use App\Mail\MailCunamhouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\Page\PageRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Logos\LogooRepositoryInterface;
use App\Repositories\Client\ClientRepositoryInterface;
use App\Repositories\Review\ReviewRepositoryInterface;
use App\Repositories\ItemOrder\ItemRepositoryInterface;
use App\Repositories\Sliders\SliderRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Checkouts\CheckoutRepositoryInterface;
use App\Repositories\ProductHome\ProductHomeRepositoryInterface;
use App\Repositories\ClientAccounts\ClientAccountRepositoryInterface;
use App\Repositories\CheckoutProducts\CheckoutProductRepositoryInterface;
use App\Repositories\CheckoutProductItems\CheckoutProductItemRepositoryInterface;

class ViewController extends Controller
{
    protected $cateRepo;
    protected $productRepo;
    protected $itemRepo;
    protected $sliderRepo;
    protected $logoRepo;
    protected $postRepo;
    protected $clientRepo;
    protected $producthomeRepo;
    protected $checkoutRepo;
    protected $checkoutProductRepo;
    protected $checkoutProductItemRepo;
    protected $reviewRepo;
    protected $pageRepo;
    protected $clientAccountRepo;

    public function __construct(
        CategoryRepositoryInterface $cateRepo,
        ProductRepositoryInterface $productRepo,
        ItemRepositoryInterface $itemRepo,
        SliderRepositoryInterface $sliderRepo,
        LogooRepositoryInterface $logoRepo,
        PostRepositoryInterface $postRepo,
        ClientRepositoryInterface $clientRepo,
        ProductHomeRepositoryInterface $producthomeRepo,
        CheckoutRepositoryInterface $checkoutRepo,
        CheckoutProductRepositoryInterface $checkoutProductRepo,
        CheckoutProductItemRepositoryInterface $checkoutProductItemRepo,
        ReviewRepositoryInterface $reviewRepo,
        PageRepositoryInterface $pageRepo,
        ClientAccountRepositoryInterface $clientAccountRepo,
    ) {
        $this->cateRepo = $cateRepo;
        $this->productRepo = $productRepo;
        $this->itemRepo = $itemRepo;
        $this->sliderRepo = $sliderRepo;
        $this->logoRepo = $logoRepo;
        $this->postRepo = $postRepo;
        $this->clientRepo = $clientRepo;
        $this->producthomeRepo = $producthomeRepo;
        $this->checkoutRepo = $checkoutRepo;
        $this->checkoutProductRepo = $checkoutProductRepo;
        $this->checkoutProductItemRepo = $checkoutProductItemRepo;
        $this->reviewRepo = $reviewRepo;
        $this->pageRepo = $pageRepo;
        $this->clientAccountRepo = $clientAccountRepo;
    }

    public function get()
    {
        $header = Header::all()->first();
        $footer = Footer::all()->first();
        $logoHeader = $this->logoRepo->getLogoHeader();
        $logo = $this->logoRepo->getLogo();
        $cate = $this->cateRepo->getParent();
        $cateChilds = $this->cateRepo->getremoveParent();
        $products = $this->productRepo->getAll();
        $post = $this->postRepo->getAll();
        $page = $this->pageRepo->getId();
        $siteConfigs = SiteConfig::first();

        return [
            //Header
            'header' => $header,
            'logo' => $logo,
            'logoHeader' => $logoHeader,
            'cates' => $cate,
            'cateChilds' => $cateChilds,
            'products' => $products,
            'posts' => $post,
            'pages' => $page,
            // /Header

            'footer' => $footer,
            'siteConfigs' => $siteConfigs,
        ];
    }
    public function home()
    {
        $lisporudct = $this->productRepo->getProduct()->take(4);
        $sliders = $this->sliderRepo->getSlider();
        $clientTestimonials = $this->clientRepo->getClientGet3();
        $producthome = $this->producthomeRepo->getProductHome();
        // $shadeCates = $this->cateRepo->getSlug('shades')->children->take(4);
        $shadeCates = $this->cateRepo->getProductCategories()->take(4);
        // dd($lisporudct);
        $attributes = [
            'lisporudct' => $lisporudct,
            'sliders' => $sliders,
            'clientTestimonials' => $clientTestimonials,
            'producthome' => $producthome,
            'shadeCates' => $shadeCates,
        ];

        $result = array_merge($attributes, $this->get());
        return view('client.home', $result);
    }

    // Mail
    public function sendmail(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            $mailData = [
                'fullname' => $request->fullname,
                'message' => $request->message,
            ];
            $attributes = $request->all();

            $mail_config = DB::table('mail_configs')->first();
            $username = $mail_config->username;
            // $username = 'hoangson28052002@gmail.com';

            \Mail::to($username)->send(new MailCunamhouse($mailData));
            return redirect()->route('home')->with('success', 'Your message has been sent successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('error', 'Some Errors Occurred');
        }
    }

    public function allCategories() {
        $categories = $this->cateRepo->getProductCategories();
        $result = array_merge(['categories' => $categories], $this->get());
        return view('client.categories', $result);
    }

    public function categories($slug = '')
    {
        $cate = $this->cateRepo->getProductPostSlug($slug);
        $productcates = $slug == '' ? $this->productRepo->getAll() : $this->cateRepo->getProductPostSlug($slug)->products()->get();

        // @dd($products);
        $attributes = [
            'cate' => $cate,
            'productcates' => $productcates
        ];
        $result = array_merge($attributes, $this->get());
        return view('client.catergory', $result);
    }
    public function categoriespost($slug)
    {
        // dd($slug);
        $cate = $this->cateRepo->getProductPostSlug($slug);

        if (!$cate) return abort(404);

        $postcates = $this->cateRepo->getProductPostSlug($slug)->posts()->get();
        // @dd($postcates);
        $attributes = [
            'cate' => $cate,
            'postcates' => $postcates
        ];
        $result = array_merge($attributes, $this->get());
        // $result = array_merge($this->get());
        return view('client.catergory-post', $result);
    }
    public function post($slug, $post)
    {
        // dd($slug);
        $cate = $this->cateRepo->getProductPostSlug($slug);
        $postcates = $this->cateRepo->getProductPostSlug($slug)->posts()->get();
        $post = $this->postRepo->getSlug($post);
        // @dd($postcates);
        $attributes = [
            'cate' => $cate,
            'postcates' => $postcates,
            'post' => $post,
        ];
        $result = array_merge($attributes, $this->get());
        // $result = array_merge($this->get());
        return view('client.post', $result);
    }

    public function products($slug = '')
    {
        if ($slug != '') return redirect()->route('home.order', ['slug' => $slug]);

        $product = $this->productRepo->getProductSlug($slug);
        $colorPros = $this->itemRepo->getColorProduct($product->id);
        $proRecommend = $this->productRepo->getProRecommend($slug);
        $showStars = $this->reviewRepo->showStar($product->id);
        // dd($showStars);
        $attributes = [
            'product' => $product,
            'colorPros' => $colorPros,
            'proRecommend' => $proRecommend,
            'showStars' => $showStars,
        ];

        $result = array_merge($attributes, $this->get());
        return view('client.product', $result);
    }
    public function productCustomizeBuy(Request $request, $slug)
    {
        $product = $this->productRepo->getProductSlug($slug);
        $colorPros = $this->itemRepo->getColorProduct($product->id);
        $proRecommend = $this->productRepo->getProRecommend($slug);
        $showStars = $this->reviewRepo->showStar($product->id);

        // $width1 = $request->input('width1');
        // $height1 = $request->input('height1');
        // $width2 = $request->input('width2');
        // $height2 = $request->input('height2');

        $orders = OrderItem::all();

        $product = $this->productRepo->getProductSlug($slug);
        $colorPros = $this->itemRepo->getColorProduct($product->id);

        $attributes = [
            // 'width1' => $width1,
            // 'height1' => $height1,
            // 'width2' => $width2,
            // 'height2' => $height2,
            'product' => $product,
            'colorPros' => $colorPros,
            'orders' => $orders,
            'proRecommend' => $proRecommend,
            'showStars' => $showStars,
        ];

        $result = array_merge($attributes, $this->get());
        return view('client.product-customize-buy', $result);
    }

    public function shoppingCart()
    {
        $result = array_merge($attributes ?? [], $this->get());
        return view('client.shopping-cart', $result);
    }

    public function removeCartItem(Request $request)
    {
        $index = $request->input('index');
        Session::forget('shopping-cart.' . $index);
        return redirect()->route('shopping-cart');
    }

    public function checkout(Request $request)
    {
        // if (!auth()->guard('web')->check()) return abort(403);

        $params = $request->input();
        unset($params['_method']);
        unset($params['_token']);

        $checkout = $this->checkoutRepo->create($params);

        $cart_items = Session::get('shopping-cart');
        $checkout_total_price = 0;
        foreach ($cart_items as $key => $product) {
            $product_total_price = $product['product_price'] * $product['amount'] + $product['option_price'];
            $checkout_total_price += $product_total_price;

            $checkout_product = $this->checkoutProductRepo->create([
                'checkout_id' => $checkout->id,
                'product_id' => $product['product_id'],
                'width' => $product['width'],
                'height' => $product['height'],
                'amount' => $product['amount'],
                'price' => $product['product_price'],
                'option_price' => $product['option_price'],
                'total_price' => $product_total_price,
            ]);

            // foreach ($product['product_item_ids'] as $key => $item_id) {
            //     $checkout_product_item = $this->checkoutProductItemRepo->create([
            //         'checkout_product_id' => $checkout_product->id,
            //         'product_item_id' => $item_id,
            //         'fabric' => $product['fabric'] ?? null,
            //     ]);
            // }

            if (isset($product['fabric'])) {
                $checkout_product_item = $this->checkoutProductItemRepo->create([
                    'checkout_product_id' => $checkout_product->id,
                    'product_item_id' => $product['fabric']['id'],
                    'fabric' => $product['fabric']['color'] ?? null,
                    'price' => $product['fabric']['price'] ?? 0,
                ]);
            }

            foreach ($product['orders'] ?? [] as $key => $item) {
                $checkout_product_item = $this->checkoutProductItemRepo->create([
                    'checkout_product_id' => $checkout_product->id,
                    'product_item_id' => $item['id'],
                    'price' => $item['price'],
                ]);
            }
        }

        $checkout->update(['total_price' => $checkout_total_price]);

        Session::forget('shopping-cart');

        if (!$request->has('account_id')) {
            try {
                $checkout_mail = new CheckoutMail($cart_items, $params);
                \Mail::to($request->input('email'))->send($checkout_mail);
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        return redirect()->route('shopping-cart');
    }

    public function myCheckouts() {
        if (!auth()->guard('web')->check()) return abort(403);

        $checkouts = auth()->guard('web')->user()->checkouts->sortByDesc('created_at');
        $attributes['checkouts'] = $checkouts;

        $result = array_merge($attributes, $this->get());
        return view('client.my-checkouts')->with($result);
    }

    public function pages($slug)
    {
        $attributes = [];
        $cate = $this->cateRepo->getSlug($slug);
        $page = $this->pageRepo->getSlug($cate->id);
        $attributes = [
            'page' => $page,
        ];
        $result = array_merge($attributes, $this->get());
        return view('client.catergory-page', $result);
    }

    public function register(Request $request) {
        $params = $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed',
        ]);

        $account = $this->clientAccountRepo->getAll()->where('email', $params['email']);
        if ($account->count() > 0) return back()->with('error', 'Email address already existed!')->with('open-modal', 'registerModal');

        $params['password'] = bcrypt($params['password']);

        $this->clientAccountRepo->create($params);

        return back()->with('success', 'Create account success!')->with('open-modal', 'loginModal');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials['is_actived'] = true;

        if (Auth::guard('web')->attempt($credentials)) {
            return back()->with('success', 'Login success!');
        }

        return back()->with('error', 'Invalid credentials!')->with('open-modal', 'loginModal');
    }

    public function logout() {
        Auth::guard('web')->logout();
        return back();
    }
}
