<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoryCrud extends Component
{
    use WithFileUploads;
    public $action,
        $stt,
        $parent_id,
        $modelCate,
        $pic,
        $category_id;

    #[Rule('required|string|max:255', message: 'Please provide a category name')]
    public $name;

    public $description;

    protected $cateRepos;

    public function boot(CategoryRepositoryInterface $cateRepos)
    {
        $this->cateRepos = $cateRepos;
    }

    public function modalSetup($id)
    {

        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }

        $this->modelCate = Category::find(abs($id));
        $this->category_id = $id;

        if ($this->modelCate) {
            $this->stt = $this->modelCate->stt;
            $this->parent_id = $this->modelCate->parent_id;
            $this->name = $this->modelCate->name;
            $this->description = $this->modelCate->description;
            $this->pic = $this->modelCate->image;
        } else {
            $this->stt = '';
            $this->parent_id = 0;
            $this->name = '';
            $this->description = '';
            $this->pic = '';
        }
    }

    public function create()
    {
        $this->validate();

        $cate = $this->cateRepos->createCate(
            $this->stt,
            $this->parent_id,
            $this->name,
            $this->description,
            $this->pic
        );
        $this->dispatch('$refresh')->to('categories.category-list');
        $this->dispatch('closeCrudCategory');
    }

    public function update()
    {
        $this->validate();

        $cate = $this->cateRepos->updateCate(
            $this->modelCate,
            $this->stt,
            $this->parent_id,
            $this->name,
            $this->description,
            $this->pic
        );

        $this->dispatch('$refresh')->to('categories.category-list');
        $this->dispatch('closeCrudCategory');
    }

    public function delete()
    {
        $cate = $this->modelCate->delete();
        $this->dispatch('$refresh')->to('categories.category-list');
        $this->dispatch('closeCrudCategory');
    }

    public function render()
    {
        $cate = $this->cateRepos->getParent();
        return view(
            'admins.category.livewire.category-crud',
            ['categories' => $cate]
        );
    }
}
