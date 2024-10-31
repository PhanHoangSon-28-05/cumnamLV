<?php

namespace App\Repositories\ItemOrder;

use App\Repositories\BaseRepository;
use App\Repositories\ItemOrder\ItemRepositoryInterface;
use Illuminate\Support\Str;

class ItemRepository extends BaseRepository implements ItemRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\ProductItems::class;
    }

    public function createItemPro(
        $id_product,
        $id_color,
        $id_item,
        $image,
        $name,
        $priceNew,
        $priceOld
    ) {
        // dd($id_item);
        if ($image) {
            $extension = $image->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $image->storeAs('ItemPro/' . $name, $filename, 'public');
        } else {
            $path = null;
        }

        $attributes = [
            'id_product' => $id_product,
            'id_color' => $id_color,
            'id_item' => $id_item,
            'image' => $path,
            'name' => $name,
            'priceNew' => $priceNew,
            'priceOld' => $priceOld
        ];
        $model = $this->model->create($attributes);
        return;
    }

    public function selectItem($id_product, $id_item)
    {
        $list = $this->model->where('id_product', $id_product)->where('id_item', $id_item)->get();
        return $list;
    }
}
