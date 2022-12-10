<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Fraction;

class  EditController extends Controller
{
    public function __invoke(Character $character)
    {
        $fractions = Fraction::all();
        return view('character.edit', compact('character', 'fractions'));
    }
}

