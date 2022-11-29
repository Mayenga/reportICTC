<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class RegisterDepartmentController extends Controller
{
    public function create()
    {
        return view('admin.newdpt');
    }

    public function store(Request $request)
    {

        $name = $request->name;

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $dpt = Department::create([
            'name' => $request->name,
        ]);
        
        return view('admin.newdpt');
    }
}
