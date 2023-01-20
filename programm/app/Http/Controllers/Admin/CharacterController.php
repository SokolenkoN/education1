<?php

namespace App\Http\Controllers\Admin;

use App\Filters\CharacterFilter;
use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Fraction;
use App\Models\Role;
use App\Models\User;


class  CharacterController extends Controller
{
    public function __invoke(CharacterFilter $request)
    {
        $characters = Character::filter($request)->paginate(10);
        $fractions = Fraction::all();
        $roles = Role::all();
        $users = User::all();
        return view('admin.character', compact('characters', 'fractions', 'roles', 'users')); //вернуть на страницу index и передать странице переменную
    }
}

