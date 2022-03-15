<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Mem;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(string $userName)
    {
        $user = User::where('name', $userName)->firstOrFail();

        return view('backend.profile', [
            'user' => $user,
            'memes' => Mem::with(['favorite','liked','photos', 'user.photos'])
                ->where('user_id', $user->id)
                ->latest()
                ->paginate(8),
        ]);
    }
}
