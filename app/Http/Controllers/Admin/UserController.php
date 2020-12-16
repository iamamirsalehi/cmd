<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdteRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users  = User::all();
        $roles  = User::usersRoles();
        $status = User::usersStatus();
        return view('admin.users.index', compact('users', 'roles', 'status'));
    }

    public function create()
    {
        $roles = User::usersRoles();
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        User::create([
            'name'      =>   $data['userFullName'],
            'email'     =>   $data['userEmail'],
            'role'      =>   $data['userRole'],
            'status'    =>   User::usersStatus()['active'],
            'password'  =>   bcrypt($data['password']),
        ]);

        session()->flash('success', 'کاربر با موفقیت ایجاد شد');

        return back();
    }

    public function edit(User $user)
    {
        $roles = User::usersRoles();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdteRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update([
            'name'  => $data['userFullName'],
            'email' => $data['userEmail'],
            'role'  => $data['userRole']
        ]);

        if($request->filled('password'))
        {
            $user->update([
                'password' => bcrypt($data['password'])
            ]);
        }

        session()->flash('success', 'کاربر با موفقیت بروزرسانی شد');

        return redirect()->route('admin.users');
    }
}
