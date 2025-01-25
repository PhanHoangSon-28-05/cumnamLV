<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Repositories\ItemOrder\ItemRepositoryInterface;

class ProductSelectOrder extends Component
{
    public $product, $colorPros, $orders, $totalPrice = 0;

    public $width1, $width2;
    public $height1, $height2;
    public $amount = 1;

    public $selectedValues = [];

    public $listItem = [];
    protected  $itemRepo;
    public function boot(ItemRepositoryInterface $itemRepo)
    {
        $this->itemRepo = $itemRepo;
    }
    public function mount($product, $colorPros, $orders)
    {
        $this->product = $product;
        $this->colorPros = $colorPros;
        $this->orders = $orders;

        // $this->getData();
    }

    public function getData()
    {
        // dd($this->product);
        $this->totalPrice = 0;
        $acreage = ($this->width1 + $this->width2) * ($this->height1 + $this->height2);
        // dd($this->product);
        if ($this->product->from != 0) {
            # code...
            $this->totalPrice += $acreage * $this->product->from;
            // dd($this->product->from);
        } else {
            $this->totalPrice += $acreage * $this->product->fromOLD;
        }

        foreach ($this->selectedValues as $value) {
            $item = $this->itemRepo->find($value);
            $this->totalPrice += $item->priceNew;
        }
    }

    public function add()
    {
        // dd($this->selectedValues);
        $cart_item = [
            'name' => $this->product->name,
            // 'width' => $this->width1 . '" ' . $this->width2,
            // 'height' => $this->height1 . '" ' . $this->height2,
            'width' => $this->width1 + $this->width2,
            'height' => $this->height1 + $this->height2,
            'image' => $this->product->pic,
            'amount' => $this->amount,
            'product_id' => $this->product->id,
            'product_item_ids' => $this->selectedValues,
        ];
        $total_price = 0;
        foreach ($this->selectedValues as $value) {
            $item = $this->itemRepo->find($value);
            // dd($item);
            // if (count($this->listItem) == 0) {
            //     # code...
            //     $this->listItem = ["id" => $item->id, "name" => $item->name, "priceNew" => $item->priceNew, "image" => $item->image];
            // } else {
            //     $this->listItem = [$this->listItem, ["id" => $item->id, "name" => $item->name, "priceNew" => $item->priceNew, "image" => $item->image]];
            // }
            // $this->listItem[] = ["id" => $item->id, "name" => $item->name, "priceNew" => $item->priceNew, "image" => $item->image];

            if ($item->id_color > 0) {
                $cart_item['fabric'] = $item->name ?? $item->color->name;
            } else {
                $cart_item['orders'][$item->order->name] = $item->name;
            }
            $total_price += $item->priceNew;
        }
        // $cart_item['price'] = $total_price;
        $cart_item['price'] = $this->totalPrice;

        // Session::forget('shopping-cart');
        Session::push('shopping-cart', $cart_item);
        // dd(Session::get('shopping-cart'));
        // dd($this->listItem);
        return redirect()->to('/shopping-cart');
    }

    public function render()
    {
        // $acreage = $this->width1 * $this->width2;

        // if ($this->product->priceNew != 0) {
        //     # code...
        //     $this->totalPrice += $acreage * $this->product->priceNew;
        //     dd($this->product->priceNew);
        // } else {
        //     $this->totalPrice += $acreage * $this->product->fromOLD;
        // }

        // foreach ($this->selectedValues as $value) {
        //     $item = $this->itemRepo->find($value);
        //     $this->totalPrice += $item->priceNew;
        // }

        $this->getData();

        return view(
            'client.livewire.product-select-order'
        );
    }
}
