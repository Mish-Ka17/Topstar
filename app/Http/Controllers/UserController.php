<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function register(Request $request)
    {// $data = $request->validate([
    //         'name'=>['required','string','max:255'],
    //         'email'=>['required','email','max:255','unique:users'],
    //         'password'=>['required','confirmed'],
    //     ]); dd($data);

         if($request->validate([
             'name'=>['required','string','max:255'],
             'email'=>['required','string','email','max:255','unique:users'],
             'password'=>['required','string','max:8','confirmed'],
         ]))
         {
            $user=User::create($request->all());

            // Логиним сразу после регистрации
            Auth::login($user);

            return back();
            //return redirect()->route('home');//'view('main');)
         };
         return redirect('main');
    }

    public function login(Request $request)
    {
      // Валидация входных данных
      $credentials = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required', 'string'],
      ]);

      // Попытка аутентификации
      if (!Auth::attempt($credentials)) {
        throw new ValidationException(
          validator: \Validator::make([], []),
          response: new JsonResponse([
              'message' => 'The given data was invalid.',
              'errors' => [
                  'email' => ['Неверный email или пароль'],
                  'password' => ['Неверный email или пароль']
              ]
          ], 422, [], JSON_UNESCAPED_UNICODE)
        );
      }

      $request->session()->regenerate();

      return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back();
        // return redirect()->route('home')->withErrors([
        //     'email' => 'Войти нужно.',
        // ])->onlyInput('email');;
    }
}
