<?php

namespace App\Repositories\Order;

use App\Repositories\RepositoryInterface;

interface OrderRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function createOrder($attributes = [], $image);
    public function updateOrder($id, $attributes = [], $image);
    public function deleteOrder($id);
}
