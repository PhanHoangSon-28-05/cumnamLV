<?php

namespace App\Repositories\Page;

use App\Repositories\RepositoryInterface;

interface PageRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getId();
    public function createPage($attributes = []);
    public function updatePage($id, $attributes = []);
    public function UploadImagePage($id, $images);
    // public function selectPage($id, $image);
}
