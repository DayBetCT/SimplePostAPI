<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository  
{
    private $post;

    public function __construct() {
        
        $this->post = new Post;
    }

    public function getAll()
    {
        return $this->post->all();
    }

    public function getByID(int $postID)
    {
        return $this->post->find($postID);
    }
}
