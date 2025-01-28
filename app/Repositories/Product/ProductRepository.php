<?php

namespace App\Repositories\Product;

use App\Models\Category;
use App\Models\ImageProducts;
use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Str;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function createProduct($attributes = [])
    {
        $attributes['slug'] = Str::slug($attributes['name']);
        $attributes['pic'] = 'null';
        $product = $this->model->create($attributes);

        return $product;
    }

    public function updateProduct($id, $attributes = [])
    {
        $result = $this->find($id);
        $attributes['slug'] = Str::slug($attributes['name']);
        // dd($result);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function UploadImageProduct($id, $images)
    {
        // dd(count($this->images));
        if ($id != null) {
            if (count($images) > 0) {
                foreach ($images as $image) {
                    $extension = $image->getClientOriginalName();
                    $filename = $id . '_' . time() . '_' . $extension;

                    $path =  $image->storeAs('products', $filename, 'public');

                    ImageProducts::create([
                        'product_id' => $id,
                        'image' => $path,
                    ]);
                }
                return true;
            }
        }
        return false;
    }

    public function selectProduct($id, $image)
    {
        $productModel = $this->model->find($id);
        $productModel->update(['pic' => $image]);
        return $productModel;
    }

    public function getProduct()
    {
        $listproduct = $this->model->orderBy('id', 'desc')->take(4)->get();
        return $listproduct;
    }

    public function getProductSlug($slug)
    {
        $product = $this->model->where('slug', $slug)->first();
        return $product;
    }

    public function getProRecommend($slug)
    {
        $product = $this->model->where('slug', $slug)->first();
        if (!$product) {
            return [];
        }
        $idCate = $product->cate;
        if (!$idCate) {
            return [];
        }

        // $cateParent = Category::where('id', $idCate->parent_id)->get()->first();
        // if (!$cateParent) {
        //     return [];
        // }
        // $cateChirlds = Category::where('parent_id', $cateParent->id)->get();
        // $attributes = [];
        // foreach ($cateChirlds as $cateChirld) {
        //     $products = $cateChirld->products;
        //     $attributes = array_merge($attributes, $products->toArray());
        // }

        $cateParentId = $idCate->parent_id;
        $attributes = $this->model->whereHas('cate', function ($query) use ($cateParentId) {
            $query->where('parent_id', $cateParentId);
        })->get()->toArray();

        $attributes = array_values($attributes);
        return $attributes;
    }
}
