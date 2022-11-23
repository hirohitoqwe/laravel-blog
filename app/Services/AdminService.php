<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminService
{
    public function PostUpdate(Request $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $post = Post::find($id);
        $post->author = $request->name;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->save();
        return redirect()->route("admin");
    }

    public function PostDelete($id): \Illuminate\Http\RedirectResponse
    {
        Post::destroy($id);
        return redirect()->route("admin");
    }

    public function UserDelete($id): \Illuminate\Http\RedirectResponse
    {
        User::destroy($id);
        return redirect()->route("admin.users");
    }

}
