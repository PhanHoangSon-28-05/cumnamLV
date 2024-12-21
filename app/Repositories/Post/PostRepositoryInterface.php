<?php

namespace App\Repositories\Post;

use App\Repositories\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getPost();
    public function createPost(
        $attributes = []
    );
    public function updatePost(
        $id,
        $attributes = []
    );
    public function deletePost($postModel);

    // View
    public function getPostCate($id);
    public function getSlug($slug);
}
