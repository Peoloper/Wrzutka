<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Mem;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        return view('backend.favourite', [
            'memes' =>  Auth::user()->favorites()->with(['photos', 'user.photos'])->latest()->paginate(10),
        ]);
    }

    public function favoriteMem(Mem $mem)
    {
        Auth::user()->favorites()->attach($mem->id);

        return back();
    }

    public function unFavoriteMem(Mem $mem)
    {
        Auth::user()->favorites()->detach($mem->id);

        return back();
    }
}
