<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;
use Auth;

class PostService implements PostServiceInterface
{
    private $postDao;

    /**
     * Constructor
     *
     * @param PostDaoInterface $postDao
     */
    public function __construct( PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * Show and Search Post List Function
     *
     * @param object $post 
     * @return void
     */
    public function show($request)
    {
        return $this->postDao->show($request);
    }

    /**
     * Show post crete confirmation page
     *
     * @param $request
     * @return $post
     */
    public function createConfirm($request)
    {
        session([
            'title' => $request->title,
            'desc'  => $request->desc
        ]);
        $post    =  new Post;
        $post->title = $request->title;
        $post->desc  = $request->desc;
        return $post;
    }

    /**
     * Store Post Details into the database
     *
     * @param $request
     * @return void
     */
    public function store($request)
    {
        $post    =  new Post;
        $post->title = $request->title;
        $post->desc  = $request->desc;
        $post->create_user_id = Auth::user()->id;
        $post->updated_user_id = Auth::user()->id;
        return $this->postDao->store($post);
    }
     /**
     * Edit Post Details
     *
     * @param $post_id
     * @return void
     */
    public function edit($post_id)
    {
        return $this->postDao->edit($post_id);
    }
    /**
     * confirm edit post
     * 
     * @param $request
     */
    public function editConfirm($request)
    {
        session([
            'title' => $request->title,
            'desc'  => $request->desc
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->status = $request->status;
        return $post;
    }
    /**
     * Update Post
     *
     * @param $request
     * @param $post_id
     * @return void
     */
    public function update($request, $post_id)
    {
        $post     =  new Post;
        $post->id     =  $post_id;
        $post->title  =  $request->title;
        $post->desc   =  $request->desc;
        $post->status =  $request->status;
        if (!$request->status) {
            $post->status = '0';
        } else {
            $post->status = '1';
        }
        return $this->postDao->update($user_id = Auth::user()->id, $post);
    }
     /**
     * SoftDelete Post
     *
     * @param $request
     * @param $post_id
     * @return void
     */
    public function destroy($request, $post_id) 
    {
        return $this->postDao->destroy($auth_id = Auth::user()->id, $post_id);
    }
}