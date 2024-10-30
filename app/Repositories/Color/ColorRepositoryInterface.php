<?php

namespace App\Repositories\Color;

use App\Repositories\RepositoryInterface;

interface ColorRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function createColor($attributes = []);
    public function updateColor($id, $attributes = []);
}
