<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use App\Models\Mem;
use App\Models\Tag;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $memes = Mem::with(['favorite','liked','photos', 'user.photos'])
            ->where('is_published', 1)
            ->latest('date_added')
            ->paginate(8);

        return view('welcome', [
            'memes' => $memes,
            'tags' => Tag::all()
        ]);
    }
}
