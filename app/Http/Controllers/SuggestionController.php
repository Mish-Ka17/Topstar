<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Suggestion;
use Illuminate\Support\Facades\Mail;
use App\Mail\SuggestionMail;

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

  // public function exit()
  // {
  //   return redirect(session('url_before_suggestion'));
  // }

  public function store(Request $request)
  {//dd($request);
    $user=Auth::user();

    $data=$request->validate([
      'name'=>['required','string','max:255'],
      'field'=>['required','string','max:255'],
      'message'=>['required','string'],
      // 'user_email'=>['required','string','email','max:255'],
      ]);

    $suggestion=Suggestion::create([
        'name'=>$data['name'],
        'field'=>$data['field'],
        'message'=>$data['message'],
        'user_email'=>$user->email,
      ]);

      Mail::to(config('mail.from.address'))
            ->send(new SuggestionMail($suggestion));

        // return back()->with('success', 'Спасибо! Предложение отправлено.');

    return view('suggestion',compact('suggestion','user'));
  }
}
