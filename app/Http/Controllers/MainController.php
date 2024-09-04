<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function homePage(){
        $posts= Post::orderBy('created_at', 'desc')->get();
        return view('home',['posts'=>$posts]);    
    }
    public function aboutPage(){
        return view('about');
    }
    public function authorPage(){
        return view('author');
    }
    public function postPage(){
        return view('post');
    }
    public function newPostPage(){
        return view('newpost');
    }
    public function searchPost(Request $request){
        $fields = $request->validate([
            "query" => "required|min:1"
        ]);
        $posts = Post::search($fields['query'])->get();
        return view ("home",['posts' =>$posts]);
    }
    public function changeProfile(Request $request){
        $fields=$request->validate([
            'title'=>['required','max:200','min:3'],
            'content'=>['required']
        ]);
        $fields['title']=strip_tags($fields['title']);
        $fields['content']=strip_tags($fields['content']);
        $fields['user_id']=auth()->id();
        Post::create($fields);        
        return redirect('/newpost')->with('success','Post has been created!');
    }
    public function editAuthorPage(User $user){
        return view('editauthor',['user'=>$user]);
    }
    public function editProfile(Request $request,User $user){
        $fields=$request->validate([
            'address'=>['required'],
            'job'=>['required'],
            'education'=>['required'],
            'avatar'=>['required','image']
        ]);
        $fields['address']=strip_tags($fields['address']);
        $fields['job']=strip_tags($fields['job']);
        $fields['education']=strip_tags($fields['education']);
        $user->address = $fields['address'];
        $user->job = $fields['job'];    
        $user->education = $fields['education'];
        //for image
        $file=$request->file('avatar');
        $custameName= auth()->user()->id ."-". Str::uuid() .".".$file->getClientOriginalExtension();
        $file->storeAs("public/avatars",$custameName);
        $user->avatar=$custameName;
        $user->save();
        return redirect('/author/'.auth()->id());
    }
}