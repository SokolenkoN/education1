<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Models\Character;

class  IndexController extends Controller
{
    public function __invoke()
    {
        $characters = Character::query()->orderBy('id', 'ASC')->get(); //присвоеть переменной значения модели и вызвать все сущности модели из бд

        return view('character.index', compact('characters')); //вернуть на страницу index и передать странице переменную
    }
}

