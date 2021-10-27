<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    private $postRepo;
    private $post;

    public function __construct() {
        
        $this->postRepo = new PostRepository;
        $this->post = new Post;
    }

    /**
     * get and return all posts
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->postRepo->getAll();
    }

    /**
     * add a new post
     *
     * @param array $post
     * @return App\Models\Post
     */
    public function addPost(array $post)
    {
        return $this->post->create($post);
    }

    /**
     * update a post
     *
     * @param App\Models\Post $post
     * @return App\Models\Post
     */
    public function getPost(Post $post)
    {
        return $this->postRepo->getByID($post->id);
    }

    /**
     * updat a post
     *
     * @param array $post
     * @param array $request
     * @return App\Models\Post
     */
    public function updatePost(array $post, array $request)
    {
        $postToUpdate = $this->postRepo->getByID($post['id']);

        $postToUpdate->update($request);

        return $postToUpdate;
    }

    public function deletePost(array $post)
    {
        $postToDelete = $this->postRepo->getByID($post['id']);

        $postToDelete->delete();

        return $postToDelete;
    }
}
