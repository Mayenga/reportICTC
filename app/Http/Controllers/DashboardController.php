<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::user()->hasRole('user')) {
            return view('users.userdashboard');
        }elseif (Auth::user()->hasRole('director')) {
            return view('director.directordashboard');
        }elseif (Auth::user()->hasRole('dg')) {
            return view('dg.dgdashboard');
        }elseif (Auth::user()->hasRole('admin')) {
            return view('admin.admindashboard');
        }
    }
}
