<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Tag $tag)
    {
        $memes = $tag->mem()
            ->with(['favorite','liked','photos', 'user.photos'])
            ->paginate(8);

        return view('frontend.tag_memes', ['memes' => $memes]);
    }
}
