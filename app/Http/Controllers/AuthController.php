<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create() {
        return view('auth.register');
    }
    public function store() {
        $formData= request()->validate([
            "name"=>"required|min:5|max:225",
            "username"=>["required","min:5","max:225",Rule::unique('users', 'username')] ,
            "email"=>["required","email",Rule::unique('users', 'email')],
            "password"=>"required|min:8",
        ]);
        $user=User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success', 'Welcome Dear '.$user->name);
    }
    public function login() {
        return view('auth.login');
   }
    public function post_login() {  
         $formData= request()->validate([
            'email'=>['required','email','max:255', Rule::exists('users', 'email')],
            'password'=>['required','min:8','max:255']
         ], ['email.required'=>'We need your email.','password.min'=>'Password must have at least 8 characters.']);
         if(auth()->attempt($formData)){
            if(auth()->user()->is_admin){
                return redirect('/admin/blogs');
            } else {
                return redirect('/')->with('success', 'Welcome back!');
            }
         } else {
            return redirect()->back()->withErrors([
                'email'=>'User credentials are incorrect.'
             ]);
         }
    }
    public function logout() {
        auth()->logout();
       return redirect('/')->with('success', 'Goodbye!');
   }
}
