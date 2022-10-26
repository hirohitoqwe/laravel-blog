<?php
namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;


class PostService
{
    public function PostUpdate(Request $request)
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
        $newPost->author=$request->name;
        $newPost->title=$request->title;
        $newPost->text=$request->text;
        $newPost->save();
        return redirect()->route("posts.index");
    }

    public function PostDestroy($id){
        Post::destroy($id);
        return redirect()->route("posts.index");
    }

}
