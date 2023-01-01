<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminService
{
    public function postUpdate(Request $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $post = Post::find($id);
        $post->author = $request->name;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->save();
        return redirect()->route("admin");
    }

    public function postDelete(int $id): \Illuminate\Http\RedirectResponse
    {
        Post::destroy($id);
        return redirect()->route("admin");
    }

    public function userDelete(int $id): \Illuminate\Http\RedirectResponse
    {
        User::destroy($id);
        return redirect()->route("admin.users");
    }

    public function commentDelete(int $id,Request $request)
    {
        Comment::destroy($id);
        return redirect($request->headers->get('referer', '/'));
    }


}
