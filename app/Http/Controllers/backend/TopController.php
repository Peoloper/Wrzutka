<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\Models\Mem;
use Illuminate\Http\Request;

class TopController extends Controller
{
   public function index()
   {
       $memes = Mem::with(['favorite','liked','photos', 'user.photos'])
           ->where('like', '>' ,100)
           ->where('is_published', 1)
           ->orderBy('like','DESC')
           ->take(50)
           ->paginate(8);


       return view('backend.top', [
           'memes' => $memes
       ]);
   }
}
