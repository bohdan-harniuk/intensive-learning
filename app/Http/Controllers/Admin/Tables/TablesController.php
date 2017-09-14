<?php

namespace App\Http\Controllers\admin\tables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class TablesController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.tables.roles', compact('users'));
    }
    
    public function postAdminAssignRoles(Request $request)
    {
        $user = User::whereEmail($request['email'])->first();
        $user->roles()->detach();
        if($request['role_user']) {
            $user->roles()->attach(Role::whereName('User')->first());
        }
        if($request['role_author']) {
            $user->roles()->attach(Role::whereName('Author')->first());
        }
        if($request['role_admin']) {
            $user->roles()->attach(Role::whereName('Admin')->first());
        }
        return redirect()->back();
    }
}
