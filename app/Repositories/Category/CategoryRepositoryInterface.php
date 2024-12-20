<?php

namespace App\Repositories\Category;

use App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getCategory();
    public function createCate($stt, $parent_id, $name, $description, $content, $image);
    public function updateCate($model, $stt, $parent_id, $name, $description, $content, $image);
    public function getParent();
    public function getremoveParent();
    public function getChildNew($id);

    public function getProduct($slug);
}
