<?php

namespace App\Livewire\Producthome;

use App\Models\HomeProduct;
use App\Repositories\ProductHome\ProductHomeRepositoryInterface;
use Livewire\Component;

class ProducthomeShow extends Component
{
    public $name, $content;

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $producthome = HomeProduct::all()->first();
        if ($producthome) {
            $this->name = $producthome->name;
            $this->content = $producthome->content;
        } else {
            $this->name = '';
            $this->content = '';
        }
    }

    public function update(ProductHomeRepositoryInterface $producthomeRepo)
    {
        $producthomeRepo->updateproducthome($this->name, $this->content);

        request()->session()->flash('success', 'producthome Update Successfully');
        $this->dispatch('$refresh')->to('producthome.producthome-show');
    }

    public function render()
    {
        return view('admins.producthome.livewire.producthome-show');
    }
}
