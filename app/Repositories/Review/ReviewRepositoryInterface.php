<?php

namespace App\Repositories\Review;

use App\Repositories\RepositoryInterface;

interface ReviewRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function check($id_product, $email);
    public function createReview($attributes = []);
    public function updateReview($id, $attributes = []);
    public function UploadImageReview($id, $images);
    public function getReview($product_id);
    public function getReviewSlug($slug);
    public function showStar($product_id);
}
