<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\Models\Mem;
use Illuminate\Http\Request;

class TopController extends Controller
{
   public function index()
   {
       $top = Mem::with(['user', 'photos', 'user.photos'])
           ->where('like', '>' ,999)
           ->orderBy('like','DESC')
           ->take(50)
           ->paginate(5);


       return view('backend.top', [
           'memes' => $top
       ]);
   }
}
