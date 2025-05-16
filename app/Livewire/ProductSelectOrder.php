<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Repositories\ItemOrder\ItemRepositoryInterface;

class ProductSelectOrder extends Component
{
    public $product, $colorPros, $orders;
    public $showStars;

    public $width1, $width2;
    public $height1, $height2;
    public $amount = 1;

    public $productPrice = 0;
    public $optionPrice = 0;
    public $totalPrice = 0;

    public $selectedValues = [];

    public $listItem = [];

    protected  $itemRepo;

    public function boot(
        ItemRepositoryInterface $itemRepo
    )
    {
        $this->itemRepo = $itemRepo;
    }

    public function mount($product, $colorPros, $orders, $showStars)
    {
        $this->product = $product;
        $this->colorPros = $colorPros;
        $this->orders = $orders;
        $this->showStars = $showStars;

        // $this->getData();
    }

    public function getData()
    {
        // $this->totalPrice = 0;
        $this->reset('productPrice', 'optionPrice');

        $acreage = ($this->width1 + $this->width2) * ($this->height1 + $this->height2) / 144;
        $price = $this->product->from != 0 ? $this->product->from : $this->product->fromOLD;

        $this->productPrice += $acreage * $price;

        foreach ($this->selectedValues as $value) {
            $item = $this->itemRepo->find($value);
            // $this->totalPrice += $item->priceNew;
            $this->optionPrice += $item->priceNew;
        }

        // $this->totalPrice = round($this->totalPrice, 2);
        $this->totalPrice = round($this->productPrice * $this->amount + $this->optionPrice, 2);
    }

    public function add()
    {
        $cart_item = [
            'name' => $this->product->name,
            'width' => $this->width1 + $this->width2,
            'height' => $this->height1 + $this->height2,
            'image' => $this->product->pic,
            'amount' => $this->amount,
            'product_id' => $this->product->id,
            'product_item_ids' => $this->selectedValues,
        ];

        foreach ($this->selectedValues as $value) {
            $item = $this->itemRepo->find($value);

            if ($item->id_color > 0) {
                $cart_item['fabric'] = [
                    'id' => $item->id,
                    'color' => $item->name ?? $item->color->name,
                    'price' => $item->priceNew,
                ];
            } else {
                $cart_item['orders'][$item->order->name] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'price' => $item->priceNew,
                ];
            }
        }

        $cart_item['product_price'] = $this->productPrice;
        $cart_item['option_price'] = $this->optionPrice;

        // Session::forget('shopping-cart');
        Session::push('shopping-cart', $cart_item);
        return redirect()->route('shopping-cart');
    }

    public function render()
    {
        $this->getData();

        return view('client.livewire.product-select-order');
    }
}
