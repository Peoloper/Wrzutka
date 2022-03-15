<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Category $category)
    {
        $memes = $category->memes()
            ->with(['favorite','liked','photos', 'user.photos'])
            ->paginate(8);

        return view('frontend.category_memes', ['memes' => $memes]);
    }
}
