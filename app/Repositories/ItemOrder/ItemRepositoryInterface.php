<?php

namespace App\Repositories\ItemOrder;

use App\Repositories\RepositoryInterface;

interface ItemRepositoryInterface extends RepositoryInterface
{
    public function createItemPro(
        $id_product,
        $id_color,
        $id_item,
        $image,
        $name,
        $priceNew,
        $priceOld
    );

    public function selectItem($id_product, $id_item);
}
