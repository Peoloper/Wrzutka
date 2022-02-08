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
        Auth::user()->likes()->attach($mem->id);
        $value = $mem->like;
        $mem->like = $value+1;
        $mem->save();

        return back();
    }

    public function unLikeMem(Mem $mem)
    {
        Auth::user()->likes()->detach($mem->id);

        $value = $mem->like;
        $mem->like = $value - 1;
        $mem->save();

        return back();
    }

    public function getLikes(Mem $mem)
    {
        $test = $mem->select('like')->where('id', $mem->id)->first();
        return response()->json($test);
    }
}
