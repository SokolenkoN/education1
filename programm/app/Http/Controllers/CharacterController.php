<?php

namespace App\Http\Controllers;

use App\Http\Resources\CharacterResource;
use App\Http\Resources\FractionResource;
use App\Models\Character;
use App\Models\CharacterEvent;
use App\Models\Event;
use App\Models\Fraction;
use App\Models\Post;
use http\Encoding\Stream\Debrotli;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::query()->orderBy('id', 'ASC')->get(); //присвоеть переменной значения модели и вызвать все сущности модели из бд


        return view('character.index', compact('characters')); //вернуть на страницу index и передать странице переменную
    }

    public function create()
    {
        $fractions = Fraction::all();
        $events = Event::all();
        return view('character.create', compact('fractions', 'events'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([ // validate проверяет значения в форме
            'name' => 'string',
            'age' => 'integer',
            'biography' => 'string',
            'obituary' => 'nullable|string',
            'health' => 'string',
            'fraction_id' => '',
            'events' => '',
        ]);

        if (isset($data['health'])) {
            $data['health'] = 'Жив';
        } else {
            $data['health'] = 'Мёртв';
        }

        $events = $data['events'];
        unset($data['events']);
//     dd($events, $data);
       $character = Character::create($data); // создать сущности из значений переменной data
//        $character->save();
        $character->events()->attach($events);
        return redirect()->route('character.index');
    }

    public function show(Character $character)
    {
       // $character = Character::query()->where('id', '=', 1)->toSql();
       return view('character.show', compact('character'));
    }

    public function edit(Character $character)
    {
        $fractions = Fraction::all();
        return view('character.edit', compact('character', 'fractions'));
    }

    public function update(Character $character)
    {
        $data = request()->validate([
            'name' => 'string',
            'age' => 'integer',
            'biography' => 'string',
            'obituary' => 'nullable|string',
            'health' => 'string',
            'fraction_id' => 'integer',
        ]);

        if (isset($data['health'])) {
            $data['health'] = 'Жив';
        } else {
            $data['health'] = 'Мёртв';
        }
        $character->update($data);
        return redirect()->route('character.show', $character->id);
    }

    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('character.index');
    }
}
