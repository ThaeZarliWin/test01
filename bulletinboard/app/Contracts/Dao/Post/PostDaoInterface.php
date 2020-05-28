<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
    public function show($request);
    public function store($post);
    public function edit($post_id);
    public function update($user_id, $post);
    public function destroy($auth_id, $post_id);
}