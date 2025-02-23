<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Repositories\Page\PageRepositoryInterface;
use Livewire\Component;

class PageCrud extends Component
{
    public $listcategories = [];

    private $pageRepo;

    public function boot(PageRepositoryInterface $pageRepo)
    {
        $this->pageRepo = $pageRepo;
    }

    public function create()
    {
        $page = $this->pageRepo->createPage($this->listcategories);

        $this->dispatch('refreshList')->to('pages.page-list');
        $this->dispatch('closeCrudPage');
    }

    public function render()
    {
        $categories = Category::all();
        return view(
            'admins.page.livewire.page-crud',
            ['categories' => $categories]
        );
    }
}
