<?php

namespace App\Livewire\Logos;

use App\Models\Logo;
use App\Repositories\Logos\LogooRepositoryInterface;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class LogoCrud extends Component
{
    use WithFileUploads;
    public $action,
        $logo,
        $pic;

    #[Validate('required', message: 'No order number has been entered')]
    public $stt;

    protected $logoRepo;

    public function boot(LogooRepositoryInterface $logoRepo)
    {
        $this->logoRepo = $logoRepo;
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
        // dd($id);
        $this->logo = Logo::find(abs($id));
        // dd($this->logo);
        $this->getData();
    }


    public function getData()
    {
        // dd($this->logo);
        if ($this->logo) {
            $this->stt = $this->logo->stt;
            $this->pic = $this->logo->pic;
        } else {
            $this->stt = '';
            $this->pic = '';
        }

        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();
        $logo = $this->logoRepo->createlogo($this->stt, $this->pic);

        $this->dispatch('refreshList')->to('logos.logo-list');
        $this->dispatch('closeCrudLogo');
    }

    public function update()
    {
        $this->validate();

        $this->logoRepo->updatelogo($this->logo, $this->stt, $this->pic);

        $this->dispatch('refreshList')->to('logos.logo-list');
        $this->dispatch('closeCrudLogo');
    }

    public function delete()
    {
        $this->logoRepo->deletelogo($this->logo);

        $this->dispatch('refreshList')->to('logos.logo-list');
        $this->dispatch('closeCrudLogo');
    }
    public function render()
    {
        if ($this->pic) {
            if (gettype($this->pic) == 'string') {
                $cover_img = route('storages.image', ['url' => $this->pic]);
            } else {
                $cover_img = $this->pic->temporaryUrl();
            }
        } else {
            $cover_img = 'images/placeholder/placeholder.png';
        }

        return view('admins.logos.livewire.logo-crud', [
            'cover_img' => $cover_img,
        ]);
    }
}
