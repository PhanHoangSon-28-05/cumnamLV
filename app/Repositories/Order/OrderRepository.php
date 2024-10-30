<?php

namespace App\Repositories\Order;

use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\OrderItem::class;
    }

    public function createOrder($attributes = [], $image)
    {
        $attributes['slug'] = Str::slug($attributes['name']);
        if ($image) {
            $extension = $image->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $image->storeAs('Orders/' . $attributes['slug'], $filename, 'public');
        } else {
            $path = null;
        }

        $attributes['image'] = $path;

        $order = $this->model->create($attributes);

        return $order;
    }

    public function updateOrder($id, $attributes = [], $image)
    {
        $attributes['slug'] = Str::slug($attributes['name']);
        if ($image != $this->model->find($id)->image) {
            Storage::disk('public')->delete($this->model->find($id)->image);
            $extension = $image->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $image->storeAs('Orders/' . $attributes['slug'], $filename, 'public');
        } else {
            $path = $image;
        }

        $attributes['image'] = $path;

        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }


    public function deleteOrder($id)
    {
        Storage::disk('public')->delete($this->model->find($id)->image);
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
