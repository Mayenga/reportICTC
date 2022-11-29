<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

class AdminController extends Controller
{
    public function userlist(){
        $users = User::all(); 
        $users = DB::select('SELECT users.name AS username,users.email,roles.name AS roles,departments.name AS dpt FROM users,role_user,roles,departments WHERE users.id = role_user.user_id AND roles.id = role_user.role_id AND users.dpt_id = departments.id');

        return view('admin.users', compact('users'));
    }
    
    public function dptlist(){
        $dpts = Department::all(); 
        $dpts = DB::select('SELECT * FROM departments');

        return view('admin.dpt', compact('dpts'));
    }
}
