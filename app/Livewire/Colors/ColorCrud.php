<?php

namespace App\Livewire\Colors;

use App\Models\Color;
use App\Repositories\Color\ColorRepositoryInterface;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ColorCrud extends Component
{
    public $action, $modelColor, $color_id;
    #[Rule('required|string|max:255', message: 'Please provide a color name')]
    public $name;
    #[Rule('required|string|max:255', message: 'Please provide a code color')]
    public $code_color = "#";

    protected $colorRepos;

    public function boot(ColorRepositoryInterface $colorRepos)
    {
        $this->colorRepos = $colorRepos;
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

        $this->modelColor = Color::find(abs($id));
        $this->color_id = $id;

        if ($this->modelColor) {
            $this->name = $this->modelColor->name;
            $this->code_color = $this->modelColor->code_color;
        } else {
            $this->name = '';
            $this->code_color = '';
        }
    }

    public function create()
    {
        $request = $this->validate();
        $this->colorRepos->createColor($request);

        $this->dispatch('closeCrudColor');
    }
    public function update()
    {
        $request = $this->validate();

        $this->colorRepos->updateColor($this->color_id, $request);

        $this->dispatch('closeCrudColor');
    }
    public function delete()
    {
        $this->modelColor->delete();

        $this->dispatch('closeCrudColor');
    }

    public function render()
    {
        return view('admins.color.livewire.color-crud');
    }
}
