<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Http\Request;


class CommentService
{
    public function storeComment(Request $request,$id){
        $title=$request->title;
        try {
            if (!empty($title)){
                $comment=new Comment();
                $comment->text=htmlspecialchars($title);
                $comment->post_id=$id;
                $comment->save();
                return redirect()->route("posts.show",$id);
            }else{
                throw new \Exception('Empty title');
            }
        }catch (\Exception $e){
            echo $e->getMessage();
        }

    }
}
