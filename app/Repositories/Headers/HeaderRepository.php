<?php

namespace App\Repositories\Headers;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

use function Laravel\Prompts\error;

class HeaderRepository extends BaseRepository implements HeaderRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Header::class;
    }

    public function getHeader()
    {
        return $this->model->get();
    }

    public function updateHeader($title1)
    {
        if ($this->model->count() == 1) {
            $Header = $this->model->all()->first()->update([
                'title1' => trim($title1),
            ]);
        } else if ($this->model->count()  == 0) {
            $Header = $this->model->create([
                'title1' => trim($title1),
            ]);
        } else {
            return error('error');
        }

        return $Header;
    }
}
