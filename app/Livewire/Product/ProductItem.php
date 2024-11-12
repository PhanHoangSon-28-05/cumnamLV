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
        $fabriccolor,
        $name,
        $priceNew,
        $priceOld;

    public $id_pro_item,
        $Newid_color,
        $Newname,
        $NewpriceNew,
        $NewpriceOld;

    protected  $itemRepo;

    public function boot(ItemRepositoryInterface $itemRepo)
    {
        $this->itemRepo = $itemRepo;
    }

    public function resetColumn()
    {
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
        $create = $this->itemRepo->createItemPro(
            $this->id_product,
            $this->id_color,
            $this->id_item,
            $this->image,
            $this->fabriccolor,
            $this->name,
            $this->priceNew,
            $this->priceOld
        );

        $this->resetColumn();
    }

    public function edit($id)
    {
        $this->id_pro_item = $id;
        $this->Newname = $this->itemRepo->find($id)->name;
        $this->Newid_color = $this->itemRepo->find($id)->id_color;
        $this->NewpriceNew = $this->itemRepo->find($id)->priceNew;
        $this->NewpriceOld = $this->itemRepo->find($id)->priceOld;
    }

    public function cancelEdit()
    {
        $this->reset(
            'id_pro_item',
            'Newid_color',
            'Newname',
            'NewpriceNew',
            'NewpriceOld'
        );
    }

    public function update()
    {
        $update = $this->itemRepo->updateItemPro(
            $this->id_pro_item,
            $this->id_product,
            $this->Newid_color,
            $this->Newname,
            $this->NewpriceNew,
            $this->NewpriceOld
        );

        $this->cancelEdit();
    }

    public function deleteImage($id)
    {
        $delete = $this->itemRepo->deleteItemPro(
            $id
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

        if ($this->fabriccolor) {
            if (gettype($this->fabriccolor) == 'string') {
                $cover_fabriccolor = 'storage/' . $this->fabriccolor;
            } else {
                $cover_fabriccolor = $this->fabriccolor->temporaryUrl();
            }
        } else {
            $cover_fabriccolor = 'images/placeholder/placeholder.png';
        }

        $orders = OrderItem::all();
        $colorPros = $this->itemRepo->getColorProduct($this->id_product);
        $colors = Color::all();
        $product = Product::find($this->id_product);
        $name_pro = $product ? $product->name : 'Product Not Found';

        return view('admins.product.livewire.product-item', [
            'orders' => $orders,
            'colors' => $colors,
            'colorPros' => $colorPros,
            'name_pro' => $name_pro,
            'cover_img' => $cover_img,
            'cover_fabriccolor' => $cover_fabriccolor,
        ]);
    }
}
