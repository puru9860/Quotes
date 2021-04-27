<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index']);
    }

    public function index()
    {
        $quotes = Quote::latest()->get();
        return view('quotes.index',compact('quotes'));
    }

    public function create()
    {
        return view('quotes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'body' => 'required|min:3',
        ]);

        $request->user()->quotes()->create($request->only('body'));

        return back();
    }

    public function edit(Quote $quote)
    {
        return view('quotes.edit',compact('quote'));
    }

    public function update(Quote $quote,Request $request)
    {
        $this->validate($request,[
            'body' => 'required|min:3',
        ]);

        $this->authorize('update',$quote);
        $quote->update($request->only('body'));
        return redirect('/');
    }

    public function destroy(Quote $quote)
    {
        $this->authorize('update',$quote);
        $quote->delete();
        return redirect('/');

    }
}
