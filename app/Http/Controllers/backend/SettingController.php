<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserPhotoRequest;
use App\Http\Traits\PhotoTrait;
use App\Http\Traits\Test;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    use PhotoTrait;
    public function index()
    {
        return view('backend.settings', ['user' => auth()->user()]);
    }

    public function updatePassword(PasswordRequest $request)
    {
        $data = $request->validated();

        $hashed = Hash::make($data['password']);
        \Auth::user()->update(['password' => $hashed]);
    }

    public function updateAvatar(UserPhotoRequest $request)
    {
        $data = $request->validated();

        $filePath = $this->uploadImage($data['img'], 'users');

        if(\Auth::user()->photos == null)
        {
            \Auth::user()->photos()->create(['path' => $filePath]);
        }
        else
        {
            $this->deleteImage(\Auth::user(), 'users');
            \Auth::user()->photos()->update(['path' => $filePath]);
        }

        return response()->json('Upload success');
    }
}
