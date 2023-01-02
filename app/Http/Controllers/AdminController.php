<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Services\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(private readonly AdminService $service)
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.admin_home', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.admin_edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        return $this->service->PostUpdate($request, $id);
    }


    public function destroy(int $id)
    {
        return $this->service->PostDelete($id);
    }

    public function users()
    {
        $users = User::all()->where('is_admin', '=', false);
        return view('admin.admin_users', compact('users'));
    }

    public function userDelete($id)
    {
        return $this->service->UserDelete($id);
    }

    public function commentDelete(int $id, Request $request)
    {
        return $this->service->commentDelete($id, $request);
    }

    public function stats()
    {
        return $this->service->stats();
    }


}
