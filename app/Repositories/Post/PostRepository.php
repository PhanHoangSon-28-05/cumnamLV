<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;
use App\Repositories\Post\PostRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Post::class;
    }

    public function getPost()
    {
        return $this->model->all();
    }

    public function createPost($attributes = [])
    {
        if ($attributes['pic']) {
            $extension = $attributes['pic']->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path = $attributes['pic']->storeAs('posts', $filename, 'public');
        } else {
            $path = 'default/path/to/image.png';
        }

        $attributes['slug'] = Str::slug($attributes['name']);
        $attributes['pic'] = $path;
        $attributes['time'] = now();

        $post = $this->model->create($attributes);

        return $post;
    }

    public function updatePost(
        $id,
        $attributes = []
    ) {
        $result = $this->find($id);
        dd($attributes);
        if ($attributes['pic'] != $result->pic) {
            Storage::disk('public')->delete($result->pic);
            $extension = $attributes['pic']->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $attributes['pic']->storeAs('posts', $filename, 'public');
        } else {
            $path = $result->pic;
        }
        $attributes['slug'] = Str::slug($attributes['name']);
        $attributes['pic'] = $path;
        $post = $result->update($attributes);

        return $post;
    }

    public function deletePost($postModel)
    {
        Storage::disk('public')->delete($postModel->pic);

        return $postModel->delete();
    }

    // Views

    public function getPostCate($id)
    {
        $posts = $this->model->where('category_id', $id)->orderBy('created_at', 'ASC')->get();
        return $posts;
    }
    public function getSlug($slug)
    {
        $posts = $this->model->where('slug', $slug)->get()->first();
        return $posts;
    }

    public function getMainPage()
    {
        return $this->model->whereIn('category_id', [])->get();
    }
}
