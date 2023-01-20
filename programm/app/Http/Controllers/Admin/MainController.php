<?php

namespace App\Http\Controllers\Admin;

use App\Filters\CharacterFilter;
use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Fraction;
use App\Models\Role;
use App\Models\User;


class  MainController extends Controller
{
    public function __invoke(CharacterFilter $request)
    {
        $characters = Character::filter($request)->paginate(10);
        $fractions = Fraction::all();
        $users = User::all();
        $roles = Role::all();
        return view('admin.home', compact('characters', 'fractions', 'users', 'roles')); //вернуть на страницу index и передать странице переменную
    }
}

