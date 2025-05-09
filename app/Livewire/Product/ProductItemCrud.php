<?php

namespace App\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Product\ProductItem;
use App\Repositories\Color\ColorRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\ItemOrder\ItemRepositoryInterface;

class ProductItemCrud extends Component
{
    use WithFileUploads;

    protected $itemRepo;
    protected $colorRepo;
    protected $orderRepo;

    public $action;
    public $colors;
    public $item;
    public $order;

    public $name;
    public $id_product;
    public $id_color;
    public $id_item;
    public $priceNew;
    public $priceOld;
    public $image;
    public $fabriccolor;

    protected $rules = [
        'name' => 'required',
        'id_product' => 'nullable',
        'id_color' => 'nullable|gt:0',
        'id_item' => 'nullable',
        'priceNew' => 'required|gt:0',
        'priceOld' => 'nullable|gt:0',
    ];

    public function boot(
        ItemRepositoryInterface $itemRepo,
        ColorRepositoryInterface $colorRepo,
        OrderRepositoryInterface $orderRepo,
    )
    {
        $this->itemRepo = $itemRepo;
        $this->colorRepo = $colorRepo;
        $this->orderRepo = $orderRepo;
    }

    public function mount($id_product) {
        $this->colors = $this->colorRepo->getAll();
    }

    public function modalSetup($item_id, $order_id) {
        if ($item_id == 0) $this->action = 'create';
        else $this->action = 'update';

        $this->item = $this->itemRepo->find($item_id);
        $this->order = $this->orderRepo->find($order_id);

        $this->getData();
    }

    public function getData() {
        $this->name = $this->item->name ?? '';
        $this->priceNew = $this->item->priceNew ?? '';
        $this->priceOld = $this->item->priceOld ?? '';
        $this->image = $this->item->image ?? '';
        
        if ($this->order) {
            $this->id_item = $this->order->id;
            $this->reset('id_color', 'fabriccolor');
        } else {
            $this->fabriccolor = $this->item->fabriccolor ?? '';
            $this->id_color = $this->item->id_color ?? 0;
            $this->reset('id_item');
        }
    }

    public function create() {
        $params = $this->validate();
        $params['image'] = $this->storeImage($this->image);
        if (!$this->order) $params['fabriccolor'] = $this->storeImage($this->fabriccolor);

        $item = $this->itemRepo->create($params);

        $this->dispatch('close-modal')->self();
        $this->dispatch('refresh')->to(ProductItem::class);
    }

    public function update() {
        $params = $this->validate();
        $params['image'] = gettype($this->image) == 'string' ? $this->image : $this->storeImage($this->image);
        if (!$this->order) 
        $params['fabriccolor'] = gettype($this->fabriccolor) == 'string' ? $this->fabriccolor : $this->storeImage($this->fabriccolor);

        $this->item->update($params);

        $this->dispatch('close-modal')->self();
        $this->dispatch('refresh')->to(ProductItem::class);
    }

    public function storeImage($image) {
        $extension = $image->getClientOriginalName();
        $filename = time() . '_' . $extension;
        $path = $image->storeAs('ItemPro/'.$this->name, $filename, 'public');

        return $path;
    }

    public function render()
    {
        if (!$this->image) {
            $cover_img = 'images/placeholder/placeholder.png';
        } elseif (gettype($this->image) == 'string') {
            $cover_img = 'storage/' . $this->image;
        } else {
            $cover_img = $this->image->temporaryUrl();
        }

        if (!$this->fabriccolor) {
            $cover_fabriccolor = 'images/placeholder/placeholder.png';
        } elseif (gettype($this->fabriccolor) == 'string') {
            $cover_fabriccolor = 'storage/' . $this->fabriccolor;
        } else {
            $cover_fabriccolor = $this->fabriccolor->temporaryUrl();
        }

        return view('admins.product.livewire.product-item-crud', [
            'cover_img' => $cover_img,
            'cover_fabriccolor' => $cover_fabriccolor,
        ]);
    }
}
