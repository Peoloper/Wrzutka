<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mem;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $memes = Mem::with(['photos', 'user.photos'])
            ->where('is_published', 1)
            ->latest('updated_at')
            ->paginate(5);

        return view('welcome', [
            'memes' => $memes,
            'categories' => Category::all(),
            'tags' =>Tag::all()
        ]);
    }
}
