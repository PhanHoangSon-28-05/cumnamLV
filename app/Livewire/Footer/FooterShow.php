<?php

namespace App\Livewire\Footer;

use App\Models\Footer;
use App\Repositories\Footers\FooterRepositoryInterface;
use Livewire\Component;

class FooterShow extends Component
{
    public $title1,
        $content11,
        $content12,
        $content13,
        $content14,
        $title2,
        $content21,
        $content22,
        $content23,
        $title3,
        $content31;
    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $footer = Footer::all()->first();
        if ($footer) {
            $this->title1 = $footer->title1;
            $this->content11 = $footer->content11;
            $this->content12 = $footer->content12;
            $this->content13 = $footer->content13;
            $this->content14 = $footer->content14;
            $this->title2 = $footer->title2;
            $this->content21 = $footer->content21;
            $this->content22 = $footer->content22;
            $this->content23 = $footer->content23;
            $this->title3 = $footer->title3;
            $this->content31 = $footer->content31;
        } else {
            $this->title1 = '';
            $this->content11 = '';
            $this->content12 = '';
            $this->content13 = '';
            $this->content14 = '';
            $this->title2 = '';
            $this->content21 = '';
            $this->content22 = '';
            $this->content23 = '';
            $this->title3 = '';
            $this->content31 = '';
        }
    }

    public function update(FooterRepositoryInterface $footerRepo)
    {
        $footerRepo->updateFooter(
            $this->title1,
            $this->content11,
            $this->content12,
            $this->content13,
            $this->content14,
            $this->title2,
            $this->content21,
            $this->content22,
            $this->content23,
            $this->title3,
            $this->content31
        );
        request()->session()->flash('success', 'Footer Update Successfully');
        $this->dispatch('$refresh')->to('footer.footer-show');
    }
    public function render()
    {
        return view('admins.footer.livewire.footer-show');
    }
}
