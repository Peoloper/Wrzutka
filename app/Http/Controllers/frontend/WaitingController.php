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
        return view('frontend.waiting', [
            'memes' => Mem::with(['photos', 'user.photos'])->where('is_published', 0)->latest()->paginate(10),
        ]);
    }
}
