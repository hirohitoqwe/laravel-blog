<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentService
{
    public function storeComment(Request $request,$id){
        $title=$request->title;
        try {
            if (isset($title)){
                $comment=new Comment();
                $comment->name=Auth::user()->name;
                $comment->text=htmlspecialchars($title);
                $comment->post_id=$id;
                $comment->save();
                return redirect()->route("posts.show",$id);
            }else{
                throw new \Exception('Empty title');
            }
        }catch (\Exception $e){
            session(['emptyCommentField'=>1]);
            return redirect()->route('posts.show',$id);
        }
    }
}
