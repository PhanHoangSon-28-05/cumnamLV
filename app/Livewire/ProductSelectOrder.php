<?php

namespace App\Livewire;

use App\Repositories\ItemOrder\ItemRepositoryInterface;
use Livewire\Component;

class ProductSelectOrder extends Component
{
    public $product, $colorPros, $orders, $totalPrice = 0;

    public $width1, $width2;
    public $height1, $height2;

    public $selectedValues = [];

    public $listItem = [];
    protected  $itemRepo;
    public function boot(ItemRepositoryInterface $itemRepo)
    {
        $this->itemRepo = $itemRepo;
    }
    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        // dd($this->product);
        $acreage = $this->width1 * $this->width2;
        if ($this->product->priceNew != 0) {
            # code...
            $this->totalPrice += $acreage * $this->product->priceNew;
            dd($this->product->priceNew);
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
        //  dd($this->selectedValues);
        foreach ($this->selectedValues as $value) {
            $item = $this->itemRepo->find($value);
            // dd($item);
            if (count($this->listItem) == 0) {
                # code...
                $this->listItem = ["id" => $item->id, "name" => $item->name, "priceNew" => $item->priceNew, "image" => $item->image];
            } else {
                $this->listItem = [$this->listItem, ["id" => $item->id, "name" => $item->name, "priceNew" => $item->priceNew, "image" => $item->image]];
            }
        }
        dd($this->listItem);
    }

    public function render()
    {
        $acreage = $this->width1 * $this->width2;

        if ($this->product->priceNew != 0) {
            # code...
            $this->totalPrice += $acreage * $this->product->priceNew;
            dd($this->product->priceNew);
        } else {
            $this->totalPrice += $acreage * $this->product->fromOLD;
        }

        foreach ($this->selectedValues as $value) {
            $item = $this->itemRepo->find($value);
            $this->totalPrice += $item->priceNew;
        }

        return view(
            'client.livewire.product-select-order'
        );
    }
}
