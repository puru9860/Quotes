<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserQuoteController extends Controller
{
    public function index(User $user)
    {
        $quotes =$user->quotes()->with(['user'])->paginate(10);
        return view('users.quotes.index',[
            'user' => $user,
            'quotes' => $quotes,
        ]);
    }
}
