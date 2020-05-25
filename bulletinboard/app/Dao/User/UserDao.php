<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Auth;
use DB;
use Hash;
use Carbon\Carbon;

class UserDao implements UserDaoInterface
{
    /**
     * Show and Search User List Function
     *
     * @param object $user
     * @return void
     */
    public function show($search)
    {
        $name = $search->name;
        $email = $search->email;
        
        $from = $search->created_from;
        $to = $search->created_to;
        if( $from && $to) {
            $users = User::where('name', 'LIKE', '%' .$name . '%')
            ->where('email', 'LIKE', '%' .$email . '%')
            ->whereBetween('created_at', [$from, $to])
            ->orderby('id', 'ASC')
            ->paginate(3);
            return $users;
        } else {
            $users = User::where('name', 'LIKE', '%' .$name . '%')
            ->where('email', 'LIKE', '%' .$email . '%')
            ->orderby('id', 'ASC')
            ->paginate(3);
            return $users;
        }
    }

    /**
     * Store User Information into the database
     *
     * @param $auth_id
     * @param $user
     */
    public function store($auth_id, $users)
    {
        $insert_user = new User([
            'name' => $users->name,
            'email' => $users->email,
            'password' => $users->password,
            'profile' => $users->profile,
            'type' => $users->type,
            'phone' => $users->phone,
            'address' => $users->address,
            'dob' => $users->dob,
            'create_user_id' => $auth_id,
            'updated_user_id' => $auth_id,
        ]);
        $insert_user->save();
        return redirect()->back();
    }
    /**
     * Destroy User Function
     * 
     * @param integer $id
     * @return void
     */
    public function destroy($id) 
    {
        $del = User::find($id)->delete();
        return back();
    }
    /**
     * Edit user profile
     *
     * @param $auth_id
     * @return $user
     */
    public function edit($auth_id)
    {
        $users = User::find($auth_id);
        return $users;
    }
    /**
     * Update User Profile
     *
     * @param $auth_id
     * @param $users
     * @return $users
     */
    public function update($auth_id, $users)
    {
        $update = User::find($auth_id);
        $update->name = $users->name;
        $update->email = $users->email;
        $update->type = $users->type;
        $update->phone = $users->phone;
        $update->address = $users->address;
        $update->profile = $users->profile;
        $update->updated_user_id = $auth_id;
        $update->updated_at = now();
        $update->save();
    }
    /**
     * Change Password
     *
     * @param $oldpwd
     * @param $newpwd
     * @param $user_id
     * @return $status
     */
    public function changepassword($oldpwd, $newpwd, $user_id)
    {
        $update_user = User::find($user_id);
        $status = Hash::check($oldpwd, $update_user->password);
        if ($status) {
            $update_user->password = Hash::make($newpwd);
            $update_user->updated_user_id = $user_id;
            $update_user->updated_at = now();
            $update_user->save();
            return $status;
        }
    }
}