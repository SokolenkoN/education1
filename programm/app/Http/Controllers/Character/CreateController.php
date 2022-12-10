<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Fraction;

class  CreateController extends BaseController
{
    public function __invoke()
    {
        $fractions = Fraction::all();
        $events = Event::all();
        return view('character.create', compact('fractions', 'events'));
    }
}

