<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function createComment(Request $request,Post $post){
        $fields=$request->validate([
            'content'=>['required','min:1',],
            'parent_id'=>['nullable','exists:comments,id']
        ]);
        $fields['user_id']=auth()->id();
        $fields['post_id']=$post->id;
        Comment::create($fields);
        return redirect('/post/' . $post->id);
    }
}