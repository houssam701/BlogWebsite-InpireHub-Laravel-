<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class postController extends Controller
{
  
    
    public function createPost(Request $request){
        $fields=$request->validate([
            'title'=>['required','max:200','min:3'],
            'content'=>['required','max:2000','min:3']
        ]);
        $fields['title']=strip_tags($fields['title']);
        $fields['content']=strip_tags($fields['content']);
        $fields['user_id']=auth()->id();
        Post::create($fields);        
        return redirect('/newpost')->with('success','Post has been created!');
    }

    public function postPage(Post $post){
        return view('post',['post'=>$post]);
    }
    public function deletePost(Post $post){
        $post->delete();
        return redirect('/')->with('success','Post has been Deleted!');

    }
    public function author(User $user){
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();

    return view('author',['posts'=>$posts,'user'=>$user,'numberOfPosts'=>count($user->posts)]);
    }
}