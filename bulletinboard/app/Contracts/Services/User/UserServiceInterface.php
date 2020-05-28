<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
    /**
     * Show User List Function
     *
     * @param object $user 
     * @return void
     */
    public function show($search);
    
    /**
     * Search User List Function
     *
     * @param Request $request
     * @return void
     */
    // public function searchUser($search);

    public function store($request);
    public function destroy($id);
    public function createConfirm($request);
    public function edit($auth_id);
    public function editConfirm($request);
    public function update($request);
    public function changepassword($request, $user_id);
}