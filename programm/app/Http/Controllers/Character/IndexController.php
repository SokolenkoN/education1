<?php

namespace App\Http\Controllers\Character;

use App\Http\Requests\Character\FilterRequest;
use App\Models\Character;
use App\Models\Fraction;

class  IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $characters = Character::query();

        $data = $request->validated();

        $this->service->filter($data, $characters);

        $characters = $characters->paginate(10);

        $fractions = Fraction::all();

        return view('character.index', compact('characters', 'fractions'));
    }
}

