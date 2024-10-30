<?php

namespace App\Repositories\Footers;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

use function Laravel\Prompts\error;

class FooterRepository extends BaseRepository implements FooterRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Footer::class;
    }

    public function getFooter()
    {
        return $this->model->get();
    }

    public function updateFooter(
        $title1,
        $content11,
        $content12,
        $content13,
        $content14,
        $title2,
        $content21,
        $content22,
        $content23,
        $title3,
        $content31,
    ) {
        if ($this->model->count() == 1) {
            $footer = $this->model->all()->first()->update([
                'title1' => $title1,
                'content11' => $content11,
                'content12' => $content12,
                'content13' => $content13,
                'content14' => $content14,
                'title2' => $title2,
                'content21' => $content21,
                'content22' => $content22,
                'content23' => $content23,
                'title3' => $title3,
                'content31' => $content31,
            ]);
        } else if ($this->model->count()  == 0) {
            $footer = $this->model->create([
                'title1' => $title1,
                'content11' => $content11,
                'content12' => $content12,
                'content13' => $content13,
                'content14' => $content14,
                'title2' => $title2,
                'content21' => $content21,
                'content22' => $content22,
                'content23' => $content23,
                'title3' => $title3,
                'content31' => $content31,
            ]);
        } else {
            return error('error');
        }

        return $footer;
    }
}
