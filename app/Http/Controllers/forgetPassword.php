<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class forgetPassword extends Controller
{
    public function forgetPage(){
        return view('forget-password');
    }

    public function forgetPassword(Request $request){
        $request->validate([
            'email' => "required|email|exists:users",
        ]);
        $token = Str::random(length: 64);

        DB::table ( table: 'password_reset_tokens')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => Carbon::now()
        ]);

        Mail::send('emails.forget-password',['token'=>$token],function($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });
        return back()->with('success',"We have send an email to reset your password!");
}


public function resetPage($token){
    return view('new-password',['token'=>$token]);
}


public function resetPassword(Request $request){
        $request->validate([
        "email" => "required|email|exists:users",
        "password" => "required|string|min:2|confirmed",
        "password_confirmation" => "required"
        ]);
        $updatePassword = DB::table(table: 'password_reset_tokens')
        ->where([
        "email" =>$request->email,
        "token" => $request->token
        ])->first();
        if (!$updatePassword){
            return redirect()->to(route( name: "reset.password"))->with("error", "Invalid");
        }
            User::where("email", $request->email)
            ->update(["password" => Hash::make($request->password)]);
            
            DB:: table( table: "password_reset_tokens")->where(["email" => $request->email])->delete();
            return redirect('/login');
}}