<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepo, $cateRepo;

    public function __construct(
        PostRepositoryInterface $postRepo,
        CategoryRepositoryInterface $cateRepo
    ) {
        $this->postRepo = $postRepo;
        $this->cateRepo = $cateRepo;
    }
    public function index()
    {
        $posts = $this->postRepo->getAll();
        // dd($posts);
        return view('admins.post.index', ['post_list' => $posts]);
    }
    public function create()
    {
        $categories = $this->cateRepo->getremoveParentPost();
        return view(
            'admins.post.create',
            [
                'categories' => $categories,
                'cover_img' => 'images/placeholder/placeholder.png'
            ]
        );
    }
    public function store(CreatePostRequest $request)
    {
        $attributes = $request->all();
        // dd($attributes);
        $post = $this->postRepo->createpost($attributes);

        return redirect()->route('posts.index')->with('success', 'Post Added Successfully');
    }
    public function edit($id)
    {
        $categories = $this->cateRepo->getremoveParentPost();
        $post = $this->postRepo->find($id);
        return view('admins.post.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        try {
            $attributes = $request->all();
            // dd($attributes);
            $post = $this->postRepo->updatepost($id, $attributes);

            return redirect()->route('posts.index')->with('success', 'post Update Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('posts.index')->with('fail' . $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->postRepo->delete($id);
            return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('posts.index')->with('fail' . $th->getMessage());
        }
    }
}
