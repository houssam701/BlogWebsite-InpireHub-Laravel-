<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class AuthController extends Controller
{
    public function loginPage(){
        return view("login");
    }
    public function signUpPage(){
        return view("signup");
    }
    public function logout(){
        auth()->logout();
        return redirect('/login')->with('failed','Logged out successfully');
    }
    public function signUp(Request $request){
        $fields=$request->validate([
            "username"=>['required','min:3','max:30','unique:users,username'],
            "email"=>['required','email','unique:users,email'],
            "password"=>['required','min:3','max:30','confirmed']      
        ]);
        $fields['password']= bcrypt($fields['password']);
        $user = User::create($fields);
        auth()->login($user);
        return redirect('/')->with('success','Account created successfully');
    }
    public function login(Request $request){
        $fields=$request->validate([
            "username"=>['required'],
            "password"=>['required']      
        ]);
        if(auth()->attempt(['username'=>$fields['username'],'password'=>$fields['password']]))
        return redirect('/')->with('success','Logged in Successfully');
        else
        return redirect('/login')->with("error","wrong credentials");
    }
}