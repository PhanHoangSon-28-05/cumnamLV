<?php

namespace App\Repositories\ProductHome;

use App\Repositories\RepositoryInterface;

interface ProductHomeRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProductHome();
    public function updateProductHome($name, $content);
}
