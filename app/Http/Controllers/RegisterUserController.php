<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('admin.newuser');
    }

    public function backcreate()
    {
        return view('admin.backnewuser');
    }

    public function isOnline($site = "https://www.google.com/"){
        if(@fopen($site,"r")){
            return true;
        }else{
            return false;
        }
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;

        $password = "ICTC123";
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'dpt_id' => $request->dpt_id,
        ]);
        $user->attachRole($request->role_id);
        event(new Registered($user));

        $data = array('name'=>$name, 'email' => $email);
        if($this->isOnline()){
            Mail::send(['html'=>'mail'], $data, function($message)use ($request) {
                $message->to($request->email, $request->name)->subject('ICT Commisiion Reporter Login credentials');
                $message->from('info@ictc.go.tz','ICTC');
            });
        }else{
            return view('admin.newuser')->with('success', "Mail sent!");   
        }
        return view('admin.newuser')->with('success', "Mail not sent!");   
    }
    
    public function backstore(Request $request)
    {
        $name = $request->name;
        $email = $request->email;

        $password = "ICTC123";
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'dpt_id' => $request->dpt_id,
        ]);
        $user->attachRole($request->role_id);
        event(new Registered($user));

        $data = array('name'=>$name, 'email' => $email);
        if($this->isOnline()){
            Mail::send(['html'=>'mail'], $data, function($message)use ($request) {
                $message->to($request->email, $request->name)->subject('ICT Commisiion Reporter Login credentials');
                $message->from('info@ictc.go.tz','ICTC');
            });
        }else{
            return view('auth.login');   
        }
        return view('auth.login');   
    }

    public function editprofile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $updateuDetails = User::find($request->id);
        $updateuDetails->update(['name' => $request->name,'email' => $request->email]);
        return redirect('/profile')->with('success', "Your details Updated successfully!");
    }

    public function resetpass(Request $request){
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required',
            'renewpassword' => 'required',
        ]);
        $updatedPass = Hash::make($request->renewpassword);
        $reqPass = Hash::make($request->password);
        $userspss = DB::select("SELECT * FROM users WHERE id = $request->id");
        foreach($userspss AS $pass){
            $dbpassword = $pass->password;
        }
        if($reqPass == $dbpassword){
            if($request->renewpassword == $request->newpassword){
                $updateuDetails = User::find($request->id);
                $updateuDetails->update(['password' => $updatedPass]);
                return redirect('/profile')->with('success', "Your Password Updated Successfully!");
            }else{
                return redirect('/profile')->with('success', "Passwords misatch!");
            }
        }else{
            return redirect('/profile')->with('success', "You entered invalid password! $dbpassword and $reqPass");
        }
    }
}
