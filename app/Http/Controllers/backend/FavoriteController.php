<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\Models\Mem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        return view('backend.favourite', [
            'memes' =>  Auth::user()->favorites()
                ->with(['photos', 'user.photos', 'favorite', 'liked'])
                ->latest()
                ->paginate(8)
        ]);
    }

    public function favoriteMem(Mem $mem)
    {
        Auth::user()->favorites()->attach($mem->id);
    }

    public function unFavoriteMem(Mem $mem)
    {
        Auth::user()->favorites()->detach($mem->id);
    }
}
