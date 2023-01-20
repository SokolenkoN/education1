<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Filters\CharacterFilter;
use App\Http\Requests\Character\FilterRequest;
use App\Models\Character;
use App\Models\Fraction;
use Illuminate\Support\Facades\Log;

class  IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $characters = Character::query();
        $data = $request->validated();

        if (isset($data['name'])) {
            $characters->where('name', 'like', "%{$data['name']}%");
        };

        if (isset($data['age'])) {
            $characters->where('age', '=', "{$data['age']}");
        };

        if (isset($data['fraction_id'])) {
            $characters->where('fraction_id', '=', "{$data['fraction_id']}");
        };

        $characters = $characters->paginate(10);

//        $characters = Character::filter($request)->paginate(10);111
        $fractions = Fraction::all();
        return view('character.index', compact('characters', 'fractions')); //вернуть на страницу index и передать странице переменную
    }
}

