<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepo, $cateRepo;

    public function __construct(
        ProductRepositoryInterface $productRepo,
        CategoryRepositoryInterface $cateRepo,
    ) {
        $this->productRepo = $productRepo;
        $this->cateRepo = $cateRepo;
    }
    public function index()
    {
        $products = $this->productRepo->getAll();
        // dd($products);
        return view('admins.product.index', ['product_list' => $products]);
    }

    public function create()
    {
        // $categories = $this->cateRepo->getremoveParentPro();
        $categories = $this->cateRepo->getProductCategories();
        return view(
            'admins.product.create',
            ['categories' => $categories]
        );
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'from' => 'required|integer',
            'fromOLD' => 'required|integer',
            // 'promotion' => 'required|integer',
            'promotion' => 'nullable|integer',
            'description' => 'required',
            'about' => 'required',
            'details' => 'required|string',
            'materials_care' => 'required|string',
            'shipping_received' => 'required|string',
        ]);
        $attributes = $request->all();
        // dd($attributes);
        $product = $this->productRepo->createProduct($attributes);

        return redirect()->route('products.index')->with('success', 'Product Added Successfully');
    }
    public function edit($id)
    {
        $categories = $this->cateRepo->getremoveParentPro();
        $product = $this->productRepo->find($id);
        return view('admins.product.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'from' => 'required|integer',
            'fromOLD' => 'required|integer',
            // 'promotion' => 'required|integer',
            'promotion' => 'nullable|integer',
            'description' => 'required',
            'about' => 'required',
            'details' => 'required|string',
            'materials_care' => 'required|string',
            'shipping_received' => 'required|string',
        ]);

        try {
            $attributes = $request->all();
            // dd($attributes);
            // $product = $this->productRepo->createProduct($attributes);
            $product = $this->productRepo->updateProduct($id, $attributes);

            return redirect()->route('products.index')->with('success', 'Product Update Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('products.index')->with('fail' . $th->getMessage());
        }
    }

    public function item($id)
    {
        return view('admins.product.item', [
            'id' => $id,
        ]);
    }
    public function destroy($id)
    {
        try {
            $this->productRepo->delete($id);
            return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('products.index')->with('fail' . $th->getMessage());
        }
    }
}
