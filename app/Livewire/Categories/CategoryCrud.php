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
        $category_id,
        $is_product_category;

    #[Rule('required|string|max:255', message: 'Please provide a category name')]
    public $name;

    public $description, $content;

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
            $this->content = $this->modelCate->content;
            $this->pic = $this->modelCate->image;
            $this->is_product_category = $this->modelCate->is_product_category;
        } else {
            $this->stt = '';
            $this->parent_id = 0;
            $this->name = '';
            $this->description = '';
            $this->content = '';
            $this->pic = '';
            $this->is_product_category = 0;
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
            $this->content,
            $this->pic
        );
        $this->dispatch('refreshList')->to('categories.category-list');
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
            $this->content,
            $this->pic
        );

        $this->dispatch('refreshList')->to('categories.category-list');
        $this->dispatch('closeCrudCategory');
    }

    public function delete()
    {
        $cate = $this->modelCate->delete();
        $this->dispatch('refreshList')->to('categories.category-list');
        $this->dispatch('closeCrudCategory');
    }

    public function render()
    {
        if ($this->pic) {
            if (gettype($this->pic) == 'string') {
                $cover_img = 'storage/' . $this->pic;
            } else {
                $cover_img = $this->pic->temporaryUrl();
            }
        } else {
            $cover_img = 'images/placeholder/placeholder.png';
        }

        $cate = $this->cateRepos->getParent();
        return view(
            'admins.category.livewire.category-crud',
            [
                'categories' => $cate,
                'cover_img' => $cover_img,
            ]
        );
    }
}
