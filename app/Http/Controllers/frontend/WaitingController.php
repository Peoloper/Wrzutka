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
        $memes = Mem::with(['photos', 'user.photos'])
            ->where('is_published', 1)
            ->latest('updated_at')
            ->paginate(5);

        return view('frontend.waiting', [
            'memes' => $memes,
            'categories' => Category::all(),
            'tags' =>Tag::all()
        ]);
    }
}
