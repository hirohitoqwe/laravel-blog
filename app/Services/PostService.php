<?php
namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostService
{
    public function PostUpdate(Request $request,int $id)
    {
        $post=Post::find($id);
        $post->author=$request->name;
        $post->title=$request->title;
        $post->text=$request->text;
        $post->save();
        return redirect()->route("posts.index");
    }

    public function PostStore(Request $request): \Illuminate\Http\RedirectResponse
    {//TODO CATCH THE NULL FIELD IN FORM
        $newPost= new Post();
        $newPost->author=htmlspecialchars($request->name);
        $newPost->title=htmlspecialchars($request->title);
        $newPost->text=htmlspecialchars($request->text);
        $newPost->user_id=htmlspecialchars(Auth::user()->id);
        $newPost->save();
        return redirect()->route('home');
    }

    public function PostDestroy($id){
        Post::destroy($id);
        return redirect()->route("posts.index");
    }

}
