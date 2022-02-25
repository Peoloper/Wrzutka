<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Mem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeMem(Mem $mem)
    {
        $mem->update(['like' => $mem->like + 1]);
        Auth::user()->likes()->attach($mem->id);

        $like = $mem->select('like')->where('id', $mem->id)->first();

        return response()->json($like);
    }

    public function unLikeMem(Mem $mem)
    {
        $mem->update(['like' => $mem->like - 1]);
        Auth::user()->likes()->detach($mem->id);

        $like = $mem->select('like')->where('id', $mem->id)->first();

        return response()->json($like);
    }
}
