<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mem;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'memes' => Mem::with(['photos', 'user.photos'])->where('is_published', 1)->latest()->paginate(10),
        ]);
    }
}
