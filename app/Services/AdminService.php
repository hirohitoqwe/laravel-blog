<?php

namespace App\Services;

use App\Mail\UserBannedEmail;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminService
{

    public function __construct(private readonly CalculateService $service){}

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
        $user=User::find($id);
        Mail::to($user->email)->send(new UserBannedEmail($user));
        User::destroy($id);
        return redirect()->route("admin.users");
    }

    public function commentDelete(int $id, Request $request)
    {
        Comment::destroy($id);
        return redirect($request->headers->get('referer', '/'));
    }

    public function stats()
    {
        $commentCount=$this->service->getCommentCount();
        $postCount=$this->service->getPostCount();
        $userCount=$this->service->getUserCount();
        $popPost=$this->service->mostPopularPost();
        return view('admin.admin_stats',compact('commentCount','postCount','userCount','popPost'));
    }


}
