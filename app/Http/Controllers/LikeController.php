<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Post $post, Request $request,Like $like){
        $like = New Like();
        $like->post_id = $post->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return redirect()
            ->route('posts.show',$post);
    }

        public function destroy(Post $post, Request $request,Like $like){
        $user = Auth::user()->id;
        $like = Like::where('post_id', $post->id)->where('user_id', $user)->first();
        $like->delete();
        return redirect()
            ->route("posts.show",$post);
    }
}
