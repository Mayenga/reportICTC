<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    // for user
    public function tasklist(){
        return view('users.tasklist');
    }
    public function report(){
        return view('users.report');
    }


    // for director
    public function todolistdir(){
        return view('director.todolistdir');
    }
    public function tasklistdir(){
        return view('director.tasklistdir');
    }
    public function newtaskdir(){
        return view('director.newtaskdir');
    }
    public function reportdir(){
        return view('director.reportdir');
    }

    public function newtododir(){
        return view('director.newtododir');
    }

    // for DG
    public function todolistdg(){
        return view('dg.todolistdg');
    }
    public function tasklistdg(){
        return view('dg.tasklistdg');
    }
    public function newtaskdg(){
        return view('dg.newtaskdg');
    }
    public function reportdg(){
        return view('dg.reportdg');
    }

    public function newtododg(){
        return view('dg.newtododg');
    }

    // for admin
    public function newuser(){
        return view('admin.newuser');
    }

    public function profile(){
        return view('profile');
    }
}