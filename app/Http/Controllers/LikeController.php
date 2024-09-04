<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likePost(Request $request){
        // Get the post_id from the request
        $postId = $request->input('post_id');
        // Find the post by ID
        $post = Post::findOrFail($postId);
        $user = auth()->id();
        $like = $post->likes()->where('user_id', $user)->first();

        if ($like) {
            // Unlike the post
            $like->delete();
            $status = 'unliked';
        } else {
            // Like the post
            $post->likes()->create(['user_id' => $user]);
            $status = 'liked';
        }

        return response()->json([
            'status' => $status,
            'likes_count' => $post->likes()->count()
        ]);
    }
}