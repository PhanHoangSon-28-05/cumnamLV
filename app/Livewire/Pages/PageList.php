<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Page;
use Livewire\Component;

class PageList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $page = Page::all();
        return view(
            'admins.page.livewire.page-list',
            ['pages' => $page]
        );
    }
}
