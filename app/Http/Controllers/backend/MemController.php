<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use App\Http\Requests\MemRequest;
use App\Http\Traits\PhotoTrait;
use App\Models\Mem;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MemController extends Controller
{
    use PhotoTrait;

    public function store(MemRequest $request)
    {
        $data = $request->validated();
        $filePath = $this->uploadImage($data['file'], 'memes');

        $mem = Mem::create($data);
        $mem->tags()->sync($data['tags']);
        $mem->photos()->create(['path' => $filePath]);
    }

    public function show(Mem $mem)
    {
        return view('frontend.mem', [
            'mem' => $mem,
        ]);
    }

    public function update(Mem $mem)
    {
        $mem->update(['is_published' => 1, 'date_added' => Carbon::now()]);
        toast('Mem został dodany na główną','success');
        return back();
    }

    public function destroy(Mem $mem)
    {
        $this->deleteImage($mem, 'memes');
        $mem->delete();
        $mem->photos()->delete();
    }
}
