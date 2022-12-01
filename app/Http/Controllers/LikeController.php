<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLike;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($id)
    {
        $count = UserLike::where('user_id', '=', auth()->user()->id)->where('post_id', '=', $id)->get();
        $postLike = new UserLike();
        if ($count->isEmpty()) {
            $postLike->user_id = auth()->user()->id;
            $postLike->post_id = $id;
            $postLike->save();
        } else {
            UserLike::where('user_id', '=', auth()->user()->id)->where('post_id', '=', $id)->delete();
        }
        return redirect(route('posts.show', $id));
    }
}
