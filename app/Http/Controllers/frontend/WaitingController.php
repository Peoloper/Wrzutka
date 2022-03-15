<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Mem;
use App\Models\Tag;
use App\Models\User;


class WaitingController extends Controller
{
    public function index()
    {
        $memes = Mem::with(['favorite','liked','photos', 'user.photos'])
            ->where('is_published', 0)
            ->latest('created_at')
            ->paginate(8);

        return view('frontend.waiting', [
            'memes' => $memes,
            'tags' => Tag::all()
        ]);
    }
}
