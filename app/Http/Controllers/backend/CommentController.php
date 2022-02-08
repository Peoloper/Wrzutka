<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Mem;
use App\Models\User;


class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = Comment::create($request->validated());

        if($request->validated())
        {
            return response()->json($request->messages());
        }
    }

    public function getComments(Mem $mem)
    {
        return response()->json($mem->comments()->latest()->get());
    }

    public function getCommentsUser($user)
    {
        $user= User::where('name',$user)->with('comments')->first();
        return view('backend.comments',[
            'user' => $user
        ]);
    }
}
