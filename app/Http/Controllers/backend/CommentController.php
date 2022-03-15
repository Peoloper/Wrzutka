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

    public function getComments(int $memid)
    {
        $comment = Comment::with(['user', 'user.photos'])
            ->where('mem_id', $memid)
            ->latest()
            ->get();

        return response()->json($comment);
    }

    public function getCommentsUser(string $userName)
    {
        $user = User::where('name', $userName)->firstOrFail();

        $comments = Comment::with(['user.photos','mem'])
            ->where('user_id', $user->id)
            ->paginate(10);

        return view('backend.comments',[
            'user' => $user,
            'comments' => $comments
        ]);
    }
}
