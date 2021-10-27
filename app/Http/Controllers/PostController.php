<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller
{
    private $postService;

    public function __construct() {

        $this->postService = new PostService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\PostCollection
     */
    public function index()
    {
        $posts = $this->postService->getAll();

        // return response()->json(new PostCollection($posts));
        // return response()->json($posts);
        return new PostCollection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PostRequest  $request
     * @return App\Http\Resources\PostResource
     */
    public function store(PostRequest $request)
    {
        $post = $this->postService->addPost($request->validated());

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return App\Http\Resources\PostResource
     */
    public function show(Post $post)
    {
        $newPost = $this->postService->getPost($post);

        return new PostResource($newPost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdatePostRequest;  $request
     * @param  App\Models\Post  $post
     * @return App\Http\Resources\PostResource
     */
    public function update(Post $post, UpdatePostRequest $request)
    {
        $updatedPost = $this->postService->updatePost($post->toArray(), $request->validated());

        return new PostResource($updatedPost);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $deletedPost = $this->postService->deletePost($post->toArray());

        return new PostResource($deletedPost);
    }
}
