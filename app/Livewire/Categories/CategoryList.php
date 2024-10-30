<?php

namespace App\Livewire\Categories;

use App\Repositories\Category\CategoryRepositoryInterface;
use Livewire\Component;

class CategoryList extends Component
{
    public function render(CategoryRepositoryInterface $cateRepo)
    {
        $cate = $cateRepo->getParent();
        return view('admins.category.livewire.category-list', [
            'categories' => $cate
        ]);
    }
}
