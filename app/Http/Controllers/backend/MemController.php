<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use App\Http\Requests\MemRequest;
use App\Http\Traits\PhotoTrait;
use App\Models\Mem;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MemController extends Controller
{
    use PhotoTrait;

    public function store(MemRequest $request)
    {
        $data = $request->validated();
        $filePath = $this->uploadImage($data['image'], 'memes');

        $mem = Mem::create($data);
        $mem->tags()->sync($data['memTagId']);
        $mem->photos()->create(['path' => $filePath]);

        return response()->json('test');

    }

    public function show(Mem $mem)
    {
        return view('frontend.mem', [
            'mem' => $mem,
        ]);
    }

    public function update(Mem $mem)
    {
        $mem->update(['is_published' => 1]);
        return back();
    }

    public function destroy(Mem $mem)
    {
        $this->deleteImage($mem, 'memes');
        $mem->delete();
        $mem->photos()->delete();
    }
}
