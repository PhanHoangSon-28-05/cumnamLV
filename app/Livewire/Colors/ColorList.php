<?php

namespace App\Livewire\Colors;

use App\Repositories\Color\ColorRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class ColorList extends Component
{
    use WithPagination;

    public $search;

    public function render(ColorRepositoryInterface $colorRepos)
    {
        // $colors = $colorRepos->getAll()->paginate(5);
        $colors = $colorRepos->getAll();
        return view(
            'admins.color.livewire.color-list',
            ['colors' => $colors]
        );
    }
}
