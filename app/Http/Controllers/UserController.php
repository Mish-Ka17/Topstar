<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function register(Request $request)
    {
         $data=$request->validate([
             'name'=>['required','string','max:255'],
             'email'=>['required','string','email','max:255','unique:users'],
             'password'=>['required','string','max:8','confirmed'],
         ]);

            $user=User::create([
              'name'=>$data['name'],
              'email'=>$data['email'],
              'password'=>bcrypt($data['password'])
            ]);

            //Вызов события регистрации пользователя (для отправки ему на емеил ссылки для подтверждения)
            event(new Registered($user));

            // Логиним сразу после регистрации
            Auth::login($user);
// dd($user->email);
          return redirect()->route('verification.notice');
//dd($user);
            //  return  view('auth.verify-email');
        //return back();
            // return redirect()->route('verification.notice');
            //return redirect()->route('verification.notice');//->with('success','Успешная регистрация');//'view('main');)
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

      //$request->session()->regenerate();

      return redirect()->back();
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
