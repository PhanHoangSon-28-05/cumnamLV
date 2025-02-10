<?php

namespace App\Livewire\Client;

use App\Repositories\Review\ReviewRepositoryInterface;
use Livewire\Component;

class Reviewcontent extends Component
{
    private $reviewRepo;
    public $product_id;

    public function boot(
        ReviewRepositoryInterface $reviewRepo,
    ) {
        $this->reviewRepo = $reviewRepo;
    }
    public function render()
    {
        $showreive = $this->reviewRepo->getReview($this->product_id);
        return view('client.livewire.reviewcontent', [
            'shows' => $showreive
        ]);
    }
}
