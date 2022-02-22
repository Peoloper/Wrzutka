<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\User;


class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = Comment::create($request->validated());
    }

    public function getComments($memid)
    {
        $comment = Comment::with(['user', 'user.photos'])
            ->where('mem_id', $memid)
            ->latest()
            ->get();

        return response()->json($comment);

        //        $comment = Comment::with(['user', 'user.photos'])
        //            ->where('mem_id', $memid)
        //            ->latest()
        //            ->get();

        //return response()->json($mem->comments()->latest()->get());
    }

    public function getCommentsUser($userName)
    {
        $user = User::where('name', $userName)->first();

        $comments = Comment::with(['user.photos','mem'])
            ->where('user_id', $user->id)
            ->get();

        return view('backend.comments',[
            'user' => $user,
            'comments' => $comments
        ]);
    }
}
