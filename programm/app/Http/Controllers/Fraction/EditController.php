<?php

namespace App\Http\Controllers\Fraction;

use App\Http\Controllers\Controller;
use App\Models\Fraction;

class EditController extends Controller
{
    public function __invoke(Fraction $fraction)
    {
        return view('fraction.edit', compact('fraction'));
    }
}
