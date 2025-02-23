<?php

namespace App\Livewire\Pages;

use App\Models\ImagePage;
use App\Models\Page;
use App\Repositories\Page\PageRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PageImageCrud extends Component
{
    use WithFileUploads;

    public $page;
    public $page_id;
    public string $name;
    public $imagesData;

    private $pageRepo;

    #[Validate(['images.*' => 'required|file|mimes:png,jpg,pdf'], message: 'Chưa nhập nội dung')]
    public $images = [];

    public function getData($id)
    {
        $this->page = Page::find(abs($id));
        $this->page_id = $this->page->id;
        $this->name = $this->page->cate->name;
        $this->imagesData = ImagePage::where('page_id', $id)->get();

        $this->resetErrorBag();
    }

    public function boot(PageRepositoryInterface $pageRepo)
    {
        $this->pageRepo = $pageRepo;
    }

    public function updateImage()
    {
        $this->validate();

        $pageImage = $this->pageRepo->UploadImagePage($this->page_id, $this->images);

        $this->images = [];
        $this->imagesData = ImagePage::where('page_id', $this->page_id)->get();
    }

    // public function selectImage($id)
    // {
    //     $img = ImagePage::find($id)->image;
    //     $pageImage = $this->pageRepo->selectPage($this->page_id, $img);

    //     $this->imagesData = ImagePage::where('page_id', $this->page_id)->get();

    //     $this->page = $this->pageRepo->find($this->page_id);
    // }


    public function deleteImage($id)
    {
        $img = ImagePage::find($id);
        Storage::disk('public')->delete($img->image);
        $img->delete();
        $this->imagesData = ImagePage::where('page_id', $this->page_id)->get();
    }

    public function render()
    {
        return view('admins.page.livewire.page-image-crud');
    }
}
