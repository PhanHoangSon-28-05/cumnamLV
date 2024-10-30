<?php

namespace App\Repositories\Color;

use App\Repositories\BaseRepository;
use App\Repositories\Color\ColorRepositoryInterface;
use Illuminate\Support\Str;

class ColorRepository extends BaseRepository implements ColorRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Color::class;
    }

    public function createColor($attributes = [])
    {

        $color = $this->model->create($attributes);

        return $color;
    }

    public function updateColor($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }
}
