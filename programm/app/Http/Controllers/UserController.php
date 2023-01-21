<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('user.registration');
    }
    public function registration(Request $request) {
        if (Auth::check()) {
            return redirect('start');
        }
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(User::where('name', '=', $data['name'])->exists()) {
            return view('user.registration')->withErrors([
                'name' => 'это Имя уже занято!'
            ]);
        }

        if(User::where('email', '=', $data['email'])->exists()) {
            return view('user.registration')->withErrors([
                'email' => 'этот email уже зарегистрирован!'
            ]);
        }

        $user = User::create($data);
        if ($user) {

            event(new Registered($user)); // отправляет письмо с ссылкой подтверждения

            Auth::login($user);
            return redirect()->route('verification.notice');
        }
        return view('user.registration')->withErrors([
            'formError' => 'Такого пользователя не существует!'
        ]);

    }

    public function login(Request $request) {
        $data = $request->only(['email', 'password']);

        if(Auth::attempt($data)) {
           // $user = $request->user();
            //$token = $user->createToken('api')->plainTextToken;
            return redirect()->intended(route('privat')); //, ['token' => $token]
        }
        return view('user.login')->withErrors([
            'email' => 'Данные указаны не верно!'
            ]);
    }

    public function loginindex() {
        return view('user.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('login.index');
    }
}
