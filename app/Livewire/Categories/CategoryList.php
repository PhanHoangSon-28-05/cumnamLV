<?php

namespace App\Livewire\Categories;

use App\Repositories\Category\CategoryRepositoryInterface;
use Livewire\Component;

class CategoryList extends Component
{
    protected $cateRepo;

    protected $listeners = [
        'refreshList' => '$refresh'
    ];

    public function boot(CategoryRepositoryInterface $cateRepo)
    {
        $this->cateRepo = $cateRepo;
    }

    public function selectPost($id)
    {
        $this->cateRepo->selectPost($id);
    }
    public function noselectPost($id)
    {
        $this->cateRepo->noselectPost($id);
    }

    public function render()
    {
        $cate = $this->cateRepo->getParent();
        return view('admins.category.livewire.category-list', [
            'categories' => $cate
        ]);
    }
}
