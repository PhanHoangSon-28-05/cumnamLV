<?php

namespace App\Livewire\Client;

use App\Models\Review as ModelsReview;
use App\Models\ReviewImage as ModelsReviewImage;
use App\Repositories\Review\ReviewRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Review extends Component
{
    use WithFileUploads;

    public $review;
    public $review_id;
    public $imagesData;

    public $action, $modelReview;

    #[Rule('required|string|max:255', message: 'Please provide stars')]
    public $star;

    #[Rule('string')]
    public $name;

    #[Rule('string')]
    public $email;

    #[Rule('string')]
    public $product_id;

    #[Rule('string')]
    public $content;

    private $reviewRepo;

    #[Rule(['images.*' => 'required|file|mimes:png,jpg,pdf'], message: 'Chưa nhập nội dung')]
    public $images = [];

    public function getData($id)
    {
        $this->review = Review::find(abs($id));
        $this->imagesData = ModelsReviewImage::where('review_id', $id)->get();

        $this->resetErrorBag();
    }

    public function boot(
        ReviewRepositoryInterface $reviewRepo,
    ) {
        $this->reviewRepo = $reviewRepo;
    }
    public function updateImage()
    {
        $request = $this->validate();

        $reviewImage = $this->reviewRepo->UploadImageReview($this->review_id, $this->images);

        $this->images = [];
        $this->imagesData = ModelsReviewImage::where('review_id', $this->review_id)->get();
    }

    public function selectImage($id)
    {
        $img = ModelsReviewImage::find($id)->image;
        $reviewImage = $this->reviewRepo->selectReview($this->review_id, $img);

        $this->imagesData = ModelsReviewImage::where('review_id', $this->review_id)->get();

        $this->review = $this->reviewRepo->find($this->review_id);
    }


    public function deleteImage($id)
    {
        $img = ModelsReviewImage::find($id);
        Storage::disk('public')->delete($img->image);
        $img->delete();
        $this->imagesData = ModelsReviewImage::where('review_id', $this->review_id)->get();
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

        $this->modelReview = ModelsReview::find(abs($id));

        if ($this->modelReview) {
            $this->star = $this->modelReview->star;
            $this->name = $this->modelReview->name;
            $this->content = $this->modelReview->content;
            $this->email = $this->modelReview->email;
        } else {
            $this->star = '';
            $this->name = '';
            $this->email = '';
            $this->content = '';
        }
    }

    public function create()
    {
        $request = $this->validate();
        if ($this->email) {
            $this->review_id = $this->reviewRepo->createReview($request);
            $this->updateImage();
            $bool = $this->reviewRepo->check($this->product_id, $this->email);
            if ($bool) {
                $this->review_id = $this->reviewRepo->createReview($request);
                $this->updateImage();
            } else {
                $this->dispatch('notify', 'error', 'You have not purchased this product so you cannot review!!!');
                // return;
            }
        } else {
            $this->dispatch('notify', 'error', 'You have not purchased this product so you cannot review!!!');
            // return;
        }

        $this->dispatch('closeCrudReview');
    }
    public function update()
    {
        $request = $this->validate();

        $this->colorRepos->updateColor($this->color_id, $request);

        $this->dispatch('closeCrudReview');
    }
    public function delete()
    {
        $this->modelColor->delete();

        $this->dispatch('closeCrudReview');
    }

    public function render()
    {
        $cover_img = 'images/placeholder/placeholder.png';
        return view('client.livewire.review', ['cover_img' => $cover_img,]);
    }
}
