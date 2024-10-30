<?php

namespace App\Livewire\Header;

use App\Models\Header;
use App\Repositories\Headers\HeaderRepositoryInterface;
use Livewire\Component;

class HeaderShow extends Component
{
    public $title1;

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $header = Header::all()->first();
        if ($header) {
            $this->title1 = $header->title1;
        } else {
            $this->title1 = '';
        }
    }

    public function update(HeaderRepositoryInterface $headerRepo)
    {
        $headerRepo->updateHeader($this->title1);

        request()->session()->flash('success', 'Header Update Successfully');
        $this->dispatch('$refresh')->to('header.header-show');
    }

    public function render()
    {
        return view('admins.header.livewire.header-show');
    }
}
