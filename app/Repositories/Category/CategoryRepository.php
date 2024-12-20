<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Storage;
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

    public function createCate($stt, $parent_id, $name, $description, $content, $image)
    {
        $stt = $stt ?? 0;
        $cateData = [
            'stt' =>  trim($stt),
            'parent_id' => $parent_id,
            'name' => trim($name),
            'slug' => Str::slug($name),
            'description' => trim($description),
            'content' => trim($content),
        ];

        if ($image != '') {
            $extension = $image->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $image->storeAs('category', $filename, 'public');

            $cateData['image'] = $path;
        }
        $cate = $this->model->create($cateData);

        return $cate;
    }

    public function updateCate($model, $stt, $parent_id, $name, $description, $content, $image)
    {
        $stt = $stt ?? 0;
        $cateData = [
            'stt' =>  trim($stt),
            'parent_id' => $parent_id,
            'name' => trim($name),
            'slug' => Str::slug($name),
            'description' => trim($description),
            'content' => trim($content),
        ];

        if ($image) {
            if ($image != $model->image) {
                try {
                    Storage::disk('public')->delete($model->image);
                    $extension = $image->getClientOriginalName();
                    $filename = time() . '_' . $extension;

                    $path =  $image->storeAs('category', $filename, 'public');

                    $cateData['image'] = $path;
                } catch (\Throwable $th) {
                    $extension = $image->getClientOriginalName();
                    $filename = time() . '_' . $extension;

                    $path =  $image->storeAs('category', $filename, 'public');

                    $cateData['image'] = $path;
                }
            } else {
                $path = $model->image;
            }
        }

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

    public function getProduct($slug)
    {
        $products = $this->model->where('slug', $slug)->first();
        return $products;
    }
}
