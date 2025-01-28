<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function createProduct($attributes = []);
    public function updateProduct($id, $attributes = []);
    public function UploadImageProduct($id, $images);
    public function selectProduct($idPro, $image);
    public function getProduct();
    public function getProductSlug($slug);
    public function getProRecommend($slug);
}
