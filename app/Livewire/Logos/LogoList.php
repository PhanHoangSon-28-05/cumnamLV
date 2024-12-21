<?php

namespace App\Livewire\Logos;

use App\Models\Logo;
use App\Repositories\Logos\LogoRepositoryInterface;
use Livewire\Component;

class LogoList extends Component
{

    protected $listeners = [
        'refreshList' => '$refresh'
    ];

    protected $logoRepo;

    public function boot(LogoRepositoryInterface $logoRepo)
    {
        $this->logoRepo = $logoRepo;
    }

    public function selectImage($id)
    {
        $this->logoRepo->selectImage($id);
    }

    public function render()
    {
        $logos = Logo::orderBy('stt', 'ASC')->get();
        return view('admins.logos.livewire.logo-list', ['logos' => $logos]);
    }
}
