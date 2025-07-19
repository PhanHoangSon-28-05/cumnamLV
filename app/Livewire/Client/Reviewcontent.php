<?php

namespace App\Livewire\Client;

use App\Repositories\Review\ReviewRepositoryInterface;
use Livewire\Component;

class Reviewcontent extends Component
{
    private $reviewRepo;
    public $product_id;
    public $showreive;
    public $review_total;
    public $max_review = 5;

    public function boot(
        ReviewRepositoryInterface $reviewRepo,
    ) {
        $this->reviewRepo = $reviewRepo;
    }

    public function mount() {
        $this->showreive = $this->reviewRepo->getReview($this->product_id);
        $this->review_total = $this->showreive->count();
    }

    public function getNextReview() {
        if ($this->max_review == $this->review_total) return;
        $this->max_review++;
    }

    public function render()
    {
        $shows = $this->showreive->take($this->max_review);
        return view('client.livewire.reviewcontent', [
            'shows' => $shows,
        ]);
    }
}
