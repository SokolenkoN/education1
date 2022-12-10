<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Models\Character;

class  DestroyController extends Controller
{
    public function __invoke(Character $character)
    {
        $character->delete();
        return redirect()->route('character.index');
    }
}

