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
        $fabriccolor,
        $name,
        $priceNew,
        $priceOld
    );
    public function updateItemPro(
        $id_pro_item,
        $id_product,
        $id_color,
        $name,
        $priceNew,
        $priceOld
    );
    public function deleteItemPro($id);
    public function selectItem($id_product, $id_item);
    public function getColorProduct($id_product);
}
