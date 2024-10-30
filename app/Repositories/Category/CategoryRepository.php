<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\Str;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function getCategory()
    {

        return $this->model->select('Category_name')->take(5)->get();
    }

    public function createCate($stt, $parent_id, $name)
    {
        $stt = $stt ?? 0;
        $cateData = [
            'stt' =>  trim($stt),
            'parent_id' => $parent_id,
            'name' => trim($name),
            'slug' => Str::slug($name),
        ];
        $cate = $this->model->create($cateData);

        return $cate;
    }

    public function updateCate($model, $stt, $parent_id, $name)
    {
        $stt = $stt ?? 0;
        $cateData = [
            'stt' =>  trim($stt),
            'parent_id' => $parent_id,
            'name' => trim($name),
            'slug' => Str::slug($name),
        ];
        $cate = $model->update($cateData);

        return $cate;
    }

    public function getParent()
    {
        $cate = $this->model->where('parent_id', 0)->orderBy('stt')->get();
        return $cate;
    }

    public function getremoveParent()
    {
        $cate = $this->model->where('parent_id', '!=', 0)->orderBy('stt')->get();
        return $cate;
    }

    public function getChildNew($id)
    {
        $cate = $this->model->where('parent_id', $id)->orderBy('stt')->get();
        return $cate;
    }
}
