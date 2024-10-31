<?php

namespace App\Livewire\Product;

use App\Models\Color;
use App\Models\OrderItem;
use App\Models\Product;
use App\Repositories\ItemOrder\ItemRepositoryInterface;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductItem extends Component
{
    use WithFileUploads;
    public $id_product,
        $id_color,
        $id_item,
        $image,
        $name,
        $priceNew,
        $priceOld;

    protected  $itemRepos;

    public function boot(ItemRepositoryInterface $itemRepos)
    {
        $this->itemRepos = $itemRepos;
    }

    public function resetColumn()
    {
        $this->id_product = '';
        $this->id_color = '';
        $this->id_item = '';
        $this->image = '';
        $this->name = '';
        $this->priceNew = '';
        $this->priceOld = '';
    }

    public function setItemId($id)
    {
        $this->id_item = $id;
    }

    public function create()
    {
        $create = $this->itemRepos->createItemPro(
            $this->id_product,
            $this->id_color,
            $this->id_item,
            $this->image,
            $this->name,
            $this->priceNew,
            $this->priceOld
        );

        $this->resetColumn();
    }

    public function render()
    {
        if ($this->image) {
            if (gettype($this->image) == 'string') {
                $cover_img = 'storage/' . $this->image;
            } else {
                $cover_img = $this->image->temporaryUrl();
            }
        } else {
            $cover_img = 'images/placeholder/placeholder.png';
        }

        $orders = OrderItem::all();
        $colors = Color::all();
        $product = Product::find($this->id_product);
        $name_pro = $product ? $product->name : 'Product Not Found';

        return view('admins.product.livewire.product-item', [
            'orders' => $orders,
            'colors' => $colors,
            'name_pro' => $name_pro,
            'cover_img' => $cover_img,
        ]);
    }
}
