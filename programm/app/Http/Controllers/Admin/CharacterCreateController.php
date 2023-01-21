<?php

namespace App\Http\Controllers\Admin;

use App\Filters\CharacterFilter;
use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Event;
use App\Models\Fraction;
use App\Models\Role;
use App\Models\User;


class  CharacterCreateController extends Controller
{
    public function __invoke(CharacterFilter $request)
    {
        $characters = Character::filter($request)->paginate(10);
        $fractions = Fraction::all();
        $roles = Role::all();
        $users = User::all();
        $events = Event::all();
        return view('admin.character_create', compact('characters', 'fractions', 'roles', 'users', 'events')); //вернуть на страницу index и передать странице переменную
    }
}

