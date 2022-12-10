<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Event;

class  ShowController extends Controller
{
    public function __invoke(Character $character)
    {
        $events = Event::all();
        // $character = Character::query()->where('id', '=', 1)->toSql();
        return view('character.show', compact('character', 'events'));
    }
}

