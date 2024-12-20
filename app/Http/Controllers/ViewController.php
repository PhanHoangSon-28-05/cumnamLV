<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Header;
use App\Models\Category;
use App\Models\OrderItem;
use App\Mail\MailCunamhouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\ItemOrder\ItemRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class ViewController extends Controller
{
    protected $cateRepo;
    protected $productRepo;
    protected $itemRepo;

    public function __construct(
        CategoryRepositoryInterface $cateRepo,
        ProductRepositoryInterface $productRepo,
        ItemRepositoryInterface $itemRepo
    ) {
        $this->cateRepo = $cateRepo;
        $this->productRepo = $productRepo;
        $this->itemRepo = $itemRepo;
    }

    public function get()
    {
        $header = Header::all()->first();
        $footer = Footer::all()->first();
        $cate = $this->cateRepo->getParent();
        $cateChilds = $this->cateRepo->getremoveParent();
        $products = $this->productRepo->getAll();

        return [
            //Header
            'header' => $header,
            // 'cateSearchPro' => $cateSearchPro,
            'cates' => $cate,
            'cateChilds' => $cateChilds,
            'products' => $products,
            // /Header

            'footer' => $footer,
        ];
    }
    public function home()
    {
        $lisporudct = $this->productRepo->getProduct();
        // dd($lisporudct);
        $attributes = [
            'lisporudct' => $lisporudct,
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

        $mailData = [
            'fullname' => $request->fullname,
            'message' => $request->message,
        ];
        $attributes = $request->all();

        \Mail::to('hoangson28052002@gmail.com')->send(new MailCunamhouse($mailData));
        return redirect()->route('home')->with('success', 'Your message has been sent successfully!');
    }

    public function categories($slug)
    {
        $cate = $this->cateRepo->getProduct($slug);
        $products = $this->cateRepo->getProduct($slug)->products()->get();
        $attributes = [
            'cate' => $cate,
            'products' => $products
        ];
        $result = array_merge($attributes, $this->get());
        return view('client.catergory', $result);
    }

    public function products($slug)
    {
        $product = $this->productRepo->getProductSlug($slug);
        $colorPros = $this->itemRepo->getColorProduct($product->id);
        $attributes = [
            'product' => $product,
            'colorPros' => $colorPros,
        ];

        $result = array_merge($attributes, $this->get());
        return view('client.product', $result);
    }
    public function productCustomizeBuy(Request $request, $slug)
    {
        $width1 = $request->input('width1');
        $height1 = $request->input('height1');
        $width2 = $request->input('width2');
        $height2 = $request->input('height2');

        $orders = OrderItem::all();

        $product = $this->productRepo->getProductSlug($slug);
        $colorPros = $this->itemRepo->getColorProduct($product->id);

        $attributes = [
            'width1' => $width1,
            'height1' => $height1,
            'width2' => $width2,
            'height2' => $height2,
            'product' => $product,
            'colorPros' => $colorPros,
            'orders' => $orders,
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
}
