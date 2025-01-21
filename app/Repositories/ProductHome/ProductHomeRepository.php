<?php

namespace App\Repositories\ProductHome;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

use function Laravel\Prompts\error;

class ProductHomeRepository extends BaseRepository implements ProductHomeRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\HomeProduct::class;
    }

    public function getProductHome()
    {
        return $this->model->all()->first();
    }

    public function updateProductHome($name, $content)
    {
        // dd($content);
        if ($this->model->count() == 1) {
            $prohome = $this->model->all()->first()->update([
                'name' => trim($name),
                'content' => trim($content),
            ]);
        } else if ($this->model->count()  == 0) {
            $prohome = $this->model->create([
                'name' => trim($name),
                'content' => trim($content),
            ]);
        } else {
            return error('error');
        }

        return $prohome;
    }
}
