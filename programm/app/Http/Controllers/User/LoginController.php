<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();

//        $this->service->login($data);
        if (Auth::attempt($data)) {
            return redirect()->intended(route('privat'));
        }
        return view('user.login')->withErrors([
            'email' => 'Данные указаны не верно!'
        ]);
    }
}
