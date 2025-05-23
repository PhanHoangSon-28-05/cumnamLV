<?php

namespace App\Livewire\Sliders;

use App\Models\Slider;
use App\Repositories\Sliders\SliderRepositoryInterface;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class SliderCrud extends Component
{
    use WithFileUploads;
    public $action,
        $slider,
        $pic;

    #[Validate('required', message: 'No order number has been entered')]
    public $stt;

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
        $this->slider = Slider::find(abs($id));
        // dd($this->slider);
        $this->getData();
    }


    public function getData()
    {
        // dd($this->slider);
        if ($this->slider) {
            $this->stt = $this->slider->stt;
            $this->pic = $this->slider->pic;
        } else {
            $this->stt = '';
            $this->pic = '';
        }

        $this->resetErrorBag();
    }

    public function create(SliderRepositoryInterface $sliderRepo)
    {
        $this->validate();
        $slider = $sliderRepo->createSlider($this->stt, $this->pic);

        $this->dispatch('refreshList')->to('sliders.slider-list');
        $this->dispatch('closeCrudSlider');
    }

    public function update(SliderRepositoryInterface $sliderRepo)
    {
        $this->validate();

        $sliderRepo->updateSlider($this->slider, $this->stt, $this->pic);

        $this->dispatch('refreshList')->to('sliders.slider-list');
        $this->dispatch('closeCrudSlider');
    }

    public function delete(SliderRepositoryInterface $sliderRepo)
    {
        $sliderRepo->deleteSlider($this->slider);

        $this->dispatch('refreshList')->to('sliders.slider-list');
        $this->dispatch('closeCrudSlider');
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

        return view('admins.sliders.livewire.slider-crud', [
            'cover_img' => $cover_img,
        ]);
    }
}
