<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Contracts\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\PasswordChangeRequest;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param userServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    public function index() {
        return view('users.user_list');
    }

    public function create()
    {
        return view('users.create_user');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function createConfirm(UserRequest $request)
    {
        $validator = $request->validated();
        $user = $this->userService->createConfirm($request);
        return view('users.create_user_confirm', compact('user'));
    }

    /**
     * Show User List Function
     *
     * @param Request $request
     * @return void
     */
    public function show(Request $request) 
    {
        session()->forget([
            'name',
            'email',
            'created_from',
            'created_to'
        ]);
        $search = new User;
        $search->name = $request->name;
        $search->email = $request->email;
        if($request->created_from) {
            $search->created_from = Carbon::parse($request->created_from)->startOfDay()->toDateTimeString();
        } 
        if ($request->created_to) {
            $search->created_to = Carbon::parse($request->created_to)->endOfDay()->toDateTimeString();
        }
        $users = $this->userService->show($search);
        return view('users.user_list', compact('users', 'search'));
    }
    /**
     * Store User Information
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert_user = $this->userService->store($request);
        return redirect()->intended('user_list')->with('success', 'User create successfully.');
    }

    /**
     * Delete user
     * 
     *@return void 
     */
    public function destroy($id)
    {
        // return response($id);
        $user = User::find($id);
        $user->deleted_user_id = Auth::user()->id;
        $user->save();
        $del = $this->userService->destroy($id);
        return redirect()->back();
        // return response($user->deleted_user_id);
    }

    /**
     * Show the form for Update User
     *
     * @param $user_id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {

        $users = $this->userService->edit($user_id);
        // return response($users);
        return view('users.update_user', compact('users'));
    }
    /**
     * Update user
     *
     * @param UpdateUserRequest $request
     * @param $user_id
     * @return \Illuminate\Http\Response
     */
    public function editConfirm(UpdateUserRequest $request, $user_id)
    {
        $validator = $request->validated();
        $user = $this->userService->editConfirm($request);
        return view('users.update_user_confirm', compact('user', 'user_id'));
    }
    /**
     * Update Profile in database
     *
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $users = $this->userService->update($request);
        return redirect()->intended('user_profile');
    }
    /**
     * Show form for Change Password
     *
     * @param $user_id
     * @return \Illuminate\Http\Response
     */
    public function password($user_id)
    {
        return view('users.change_password', compact('user_id'));
    }
    /**
     * Store Change Password after validation
     *
     * @param PasswordChangeRequest $request
     * @param $user_id
     * @return \Illuminate\Http\Response
     */
    public function changepassword(PasswordChangeRequest $request, $user_id)
    {
        $validator = $request->validated();
        $status = $this->userService->changepassword($request, $user_id);
        // return response($user_id);
        return redirect()->intended('user_list');
    }
}
