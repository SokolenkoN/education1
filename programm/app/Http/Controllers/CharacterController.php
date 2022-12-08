<?php

namespace App\Http\Controllers;

use App\Http\Resources\CharacterResource;
use App\Models\Character;
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

    public function create(Character $character)
    {
        return view('character.create', compact('character'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([ // validate проверяет значения в форме
            'name' => 'string',
            'age' => 'integer',
            'biography' => 'string',
            'obituary' => 'nullable|string',
            'health' => 'string',
        ]);

        if (isset($data['health'])) {
            $data['health'] = 'Жив';
        } else {
            $data['health'] = 'Мёртв';
        }

        Character::create($data); // создать сущности из значений переменной data

        return redirect()->route('character.index');
    }

    public function show(Character $character)
    {
       return view('character.show', compact('character'));
    }

    public function edit(Character $character)
    {
        return view('character.edit', compact('character'));
    }

    public function update(Character $character)
    {
        $data = request()->validate([
            'name' => 'string',
            'age' => 'integer',
            'biography' => 'string',
            'obituary' => 'nullable|string',
            'health' => 'string',
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
