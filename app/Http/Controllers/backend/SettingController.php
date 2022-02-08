<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Mem;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        return view('backend.settings');
    }
}
