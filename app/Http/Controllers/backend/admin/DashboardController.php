<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Mem;
use App\Models\Tag;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('backend.admin.dashboard.index', [
            'mem' => Mem::count(),
            'category' => Category::count(),
            'tag' => Tag::count(),
            'user' => User::count(),
        ]);
    }
}
