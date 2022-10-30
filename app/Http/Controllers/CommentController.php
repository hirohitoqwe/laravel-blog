<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(private readonly CommentService $service){}

    public function store(Request $request,$id){
        return $this->service->storeComment($request,$id);
    }
}
