<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;
use Hash;
use App\Models\User;
use Auth;

class UserService implements UserServiceInterface
{
    private $userDao;

    /**
     * Constructor
     *
     * @param userDaoInterface $userDao
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * Show and Search User List Function
     *
     * @param object $user 
     * @return void
     */
    public function show($search)
    {
        return $this->userDao->show($search);
    }

    /**
     * Password Hide and move image to temp file
     *
     * @param $request
     * @return $users
     */
    public function createConfirm($request)
    {
        $pwd = $request->password;
        $pwd_hide = str_pad('*', strlen($pwd), '*');
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->pwd = $pwd;
        $profile_img = $request->file('profileImg');
        $filename = $profile_img->getClientOriginalName();
        $profile_img->move('img/tempProfile', $filename);
        $user->filename = $filename;
        $user->type = $request->type;
        $user->pwd_hide = $pwd_hide;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->address = $request->address;

        session()->forget([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
        ]);
        return $user;
    }

    /**
     * Registration user
     *
     * @param $request
     * @return void
     */
    public function store($request)
    {
        $user_type = $request->type;
        if ($user_type == null) {
            $user_type = '1';
        }
        $users = new User([
            'name'  => $request->name,
            'email' => $request->email,
            'password'  => Hash::make($request->password),
            'type'  => $user_type,
            'phone' => $request->phone,
            'dob'   => $request->dob,
            'address'   => $request->address,
            'profile'   => $request->filename,
        ]);
        return $this->userDao->store($auth_id = Auth::user()->id , $users);
    }
    /**
     * Destroy User Function
     * 
     * @param integer $id
     * @return void
     */
    public function destroy($id)
    {
        return $this->userDao->destroy($id);
    }
    /**
     * Edit User Profile
     *
     * @param $auth_id
     * @return void
     */
    public function edit($auth_id)
    {
        session()->forget([
            'title',
            'desc',
            'name',
            'email',
            'type',
            'phone',
            'dob',
            'address'
        ]);
        return $this->userDao->edit($auth_id);
    }
    /**
     * Move New Profile into temp file
     *
     * @param $request
     * @return $filename
     */
    public function editConfirm($request)
    {
        session([
            'title',
            'desc',
            'name',
            'email',
            'type',
            'phone',
            'dob',
            'address'
        ]);
        $new_profile = $request->file('profileImg');
        if ($filename = $new_profile) {
            $filename = $new_profile->getClientOriginalName();
            $new_profile->move('img/tempProfile', $filename);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->filename= $filename;
        return $user;
    }
    /**
     * Update User Profile
     *
     * @param $auth_id
     * @param $user
     * @return void
     */
    public function update($request)
    {
        $users = new User([
            'name'  => $request->name,
            'email' => $request->email,
            'password'  => $request->password,
            'type'  => $request->type,
            'phone' => $request->phone,
            'dob'   => $request->dob,
            'address'   => $request->address,
            'profile'   => $request->filename,
        ]);
        return $this->userDao->update($auth_id = Auth::user()->id, $users);
    }
    /**
     * Change Password
     *
     * @param $request
     * @param $user_id
     * @return void
     */
    public function changepassword($request, $user_id)
    {
        $oldpwd = $request->oldpassword;
        $newpwd = $request->newpassword;
        return $this->userDao->changepassword($oldpwd, $newpwd, $user_id);
    }

}