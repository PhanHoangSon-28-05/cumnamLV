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
        $name_pro = Product::find($this->id_product)->name;

        return view('admins.product.livewire.product-item', [
            'orders' => $orders,
            'colors' => $colors,
            'name_pro' => $name_pro,
            'cover_img' => $cover_img,
        ]);
    }
}
