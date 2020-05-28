<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
    /**
     * Show Post List Function
     *
     * @param object $post 
     * @return void
     */
    public function show($request);

    public function edit($post_id);
    public function editConfirm($request);
    public function createConfirm($request);
    public function store($request);
    public function update($request, $post_id);
    public function destroy($auth_id, $post_id);
}
