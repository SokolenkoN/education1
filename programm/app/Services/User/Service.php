<?php


namespace App\Services\User;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function registration($data)
    {
        if (Auth::check()) {
            return redirect('start.index');
        }
        if (User::where('name', '=', $data['name'])->exists()) {
            return view('user.registration')->withErrors([
                'name' => 'это Имя уже занято!'
            ]);
        }
        if (User::where('email', '=', $data['email'])->exists()) {
            return view('user.registration')->withErrors([
                'email' => 'этот email уже зарегистрирован!'
            ]);
        }
        $user = User::create($data);
        if ($user) {

            event(new Registered($user)); // событие отправки письма с ссылкой подтверждения

            Auth::login($user);
            return redirect()->route('verification.notice');
        }
        return view('user.registration')->withErrors([
            'formError' => 'Такого пользователя не существует!'
        ]);
    }

    public function login($data)
    {
        if (Auth::attempt($data)) {
            return redirect()->intended(route('privat'));
        }
        return view('user.login')->withErrors([
            'email' => 'Данные указаны не верно!'
        ]);
    }
}
