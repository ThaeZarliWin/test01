<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;

class PostDao implements PostDaoInterface
{
   /**
     * Show Post List Function
     *
     * @param object $post
     * @return void
     */
    public function show($request)
    {
        session([
            'search' => $request->search
        ]);
        $search = $request->get('search');
        $posts = Post::with('posts')
        ->where ('title', 'LIKE', '%' .$search . '%' )
        ->orwhere ('description', 'LIKE', '%' .$search . '%' )
        ->paginate(5);
        return $posts;
    }
    /**
     * Store Post Details into the database
     *
     * @param $auth_id
     * @param $post
     * @return $posts
     */
    public function store($post)
    {
        $insert_post = new Post([
            'title' => $post->title,
            'description' => $post->desc,
            'create_user_id' => $post->create_user_id,
            'updated_user_id' => $post->updated_user_id,
        ]);
        $insert_post->save();
        return redirect()->back();
    }

     /**
     * Edit Post Details
     *
     * @param $post_id
     * @return $post_detail
     */
    public function edit($post_id)
    {
        $post_detail = Post::find($post_id);
        return $post_detail;
    }
    /**
     * Update Post
     *
     * @param $user_id
     * @param $post
     * @return $posts
     */
    public function update($user_id, $post)
    {
        $update_post = Post::find($post->id);
        $update_post->title = $post->title;
        $update_post->description = $post->desc;
        $update_post->status = $post->status;
        $update_post->updated_user_id = $user_id;
        $update_post->updated_at = now();
        $update_post->save();
    }
     /**
     * SoftDelete Post
     *
     * @param $auth_id
     * @param $post_id
     */
    public function destroy($auth_id, $post_id)
    {
        $delete_post = Post::findOrFail($post_id);
        $delete_post->deleted_user_id = $auth_id;
        $delete_post->deleted_at = now();
        $delete_post->save();
    }
}