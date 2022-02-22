<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{

    public function index()
    {
        return view('backend.settings');
    }

    public function updatePassword(PasswordRequest $request)
    {
        $data = $request->validated();

        $hashed = Hash::make($data['password']);
        \Auth::user()->update(['password' => $hashed]);

        return response()->json('dzia');

    }
    public function updateAvatar(Request $request)
    {
        return response()->json($request);
    }
}
