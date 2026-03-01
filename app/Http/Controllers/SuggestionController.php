<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    public function index()
    { //dd(Auth::check());
      if(Auth::check())
        {
        $user=Auth::user();
        return view('form-suggestion',compact('user'));
        }
      return view('form-suggestion');
    }

    public function store(Request $request)
    {

    }
}
