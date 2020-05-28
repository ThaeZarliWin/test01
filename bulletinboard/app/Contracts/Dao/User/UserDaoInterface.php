<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
    /**
     * Show and Search User List Function
     *
     * @param object $user
     * @return void
     */
    public function show($search);

    public function store($auth_id, $users);
    public function destroy($id);
    public function edit($auth_id);
    public function update($users, $user_id);
    public function changepassword($oldpwd, $newpwd, $user_id);
}