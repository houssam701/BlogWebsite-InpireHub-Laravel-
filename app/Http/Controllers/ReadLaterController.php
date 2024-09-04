<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ReadLater;
use Illuminate\Http\Request;

class ReadLaterController extends Controller
{
    public function readLater(Request $request){
        $postId=$request->post_id;
        $user_id=auth()->id();
        $readLater=ReadLater::where('post_id',$postId)->where('user_id',$user_id)->first();
        if($readLater){
            $readLater->delete();
            return response()->json(['status'=>'removed']);
        }else{
            ReadLater::create(['post_id'=>$postId,'user_id'=>$user_id]);
            return response()->json(['status'=>'added']);
        }
    }
    public function savedPost(){
        $userId = auth()->id();
        $savedPosts = Post::whereIn('id', ReadLater::where('user_id', $userId)->pluck('post_id'))->get();
        return view('savedPost', compact('savedPosts'));
    }
}