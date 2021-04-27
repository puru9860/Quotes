<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Quote $quote, Request $request)
    {
        if($quote->favoritedBy($request->user()))
        {
            $request->user()->favourites()->where('quote_id',$quote->id)->delete();
            return back();
        }
        $quote->favorites()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }
}
