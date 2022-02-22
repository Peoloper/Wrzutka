<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function __invoke(Request $request)
    {
        $permissions = Permission::all();
        return view('backend.admin.permission.index', ['permissions' => $permissions ]);
    }
}
