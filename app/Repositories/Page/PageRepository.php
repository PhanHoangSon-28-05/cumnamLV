<?php

namespace App\Repositories\Page;

use App\Models\ImagePage;
use App\Repositories\BaseRepository;
use App\Repositories\Page\PageRepositoryInterface;
use Illuminate\Support\Str;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Page::class;
    }

    public function getId()
    {
        $id = $this->model->pluck('id_cate')->toArray();
        return $id;
    }

    public function createPage($attributes = [])
    {
        foreach ($attributes as $value) {
            # code...
            $page = $this->model->create(['id_cate' => $value]);
        }

        return $page;
    }

    public function updatePage($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }
    public function UploadImagePage($id, $images)
    {
        // dd(count($this->images));
        if ($id != null) {
            if (count($images) > 0) {
                foreach ($images as $image) {
                    $extension = $image->getClientOriginalName();
                    $filename = $id . '_' . time() . '_' . $extension;

                    $path =  $image->storeAs('pages', $filename, 'public');

                    ImagePage::create([
                        'page_id' => $id,
                        'image' => $path,
                    ]);
                }
                return true;
            }
        }
        return false;
    }

    public function selectImagePage($id, $image)
    {
        $pageModel = $this->model->find($id);
        $pageModel->update(['image' => $image]);
        return $pageModel;
    }

    public function getSlug($id)
    {
        $page = $this->model->where('id_cate', $id)->first();
        return $page;
    }
}
