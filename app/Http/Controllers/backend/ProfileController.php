<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Mem;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user)
    {
        $userx = User::where('name', $user)->firstOrFail();
        $id = $userx->id;
        return view('backend.profile', [
            'user' => $userx,
            'memes' => Mem::with(['photos', 'user.photos', 'category'])->where('user_id', $id)->latest()->paginate(10),

        ]);
    }
}
