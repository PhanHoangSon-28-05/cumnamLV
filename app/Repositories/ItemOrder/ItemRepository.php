<?php

namespace App\Repositories\ItemOrder;

use App\Repositories\BaseRepository;
use App\Repositories\ItemOrder\ItemRepositoryInterface;
use Illuminate\Support\Facades\Storage;
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
        $fabriccolor,
        $name,
        $priceNew,
        $priceOld
    ) {
        // dd($id_item);
        if ($image) {
            $extension = $image->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path1 =  $image->storeAs('ItemPro/' . $name, $filename, 'public');
        } else {
            $path1 = null;
        }
        if ($fabriccolor) {
            $extension = $fabriccolor->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path2 =  $fabriccolor->storeAs('ItemPro/' . $name, $filename, 'public');
        } else {
            $path2 = null;
        }

        $attributes = [
            'id_product' => $id_product,
            'id_color' => $id_color,
            'id_item' => $id_item,
            'image' => $path1,
            'fabriccolor' => $path2,
            'name' => $name,
            'priceNew' => $priceNew,
            'priceOld' => $priceOld
        ];
        $model = $this->model->create($attributes);
        return;
    }

    public function updateItemPro(
        $id_pro_item,
        $id_product,
        $id_color,
        $name,
        $priceNew,
        $priceOld
    ) {
        $attributes = [
            'id_product' => $id_product,
            'id_color' => $id_color,
            'name' => $name,
            'priceNew' => $priceNew,
            'priceOld' => $priceOld
        ];

        $result = $this->find($id_pro_item);
        // dd($result);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return;
    }

    public function deleteItemPro($id)
    {
        $result = $this->find($id);
        if ($result->image) {
            Storage::disk('public')->delete($result->image);
        }
        if ($result->fabriccolor) {
            Storage::disk('public')->delete($result->fabriccolor);
        }
        if ($result) {
            $result->delete();

            return true;
        }
        return false;
    }

    public function selectItem($id_product, $id_item)
    {
        $list = $this->model->where('id_product', $id_product)->where('id_item', $id_item)->get();
        return $list;
    }

    public function getColorProduct($id_product)
    {
        $list = $this->model->where('id_product', $id_product)->where('id_color', '<>', 'null')->get();
        return $list;
    }
}
