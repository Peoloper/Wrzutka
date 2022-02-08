<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\Models\Mem;
use Illuminate\Http\Request;

class TopController extends Controller
{
   public function index()
   {
       return view('backend.top', ['memes' => Mem::with(['user', 'photos', 'user.photos'])->orderBy('like','ASC')->take(100)->paginate(9)]);
   }
}
