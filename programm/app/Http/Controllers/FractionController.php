<?php

namespace App\Http\Controllers;

use App\Http\Resources\CharacterResource;
use App\Http\Resources\FractionResource;
use App\Models\Fraction;
use App\Models\Character;
use App\Models\Post;
use App\Models\User;
use http\Encoding\Stream\Debrotli;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class FractionController extends Controller
{
    public function index()
    {
        $fractions = Fraction::all(); //присвоеть переменной значения модели и вызвать все сущности модели из бд


        return view('fraction.index', compact('fractions')); //вернуть на страницу index и передать странице переменную
    }

    public function create()
    {
        return view('fraction.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([ // validate проверяет значения в форме
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $fraction = Fraction::create($data); // создать сущности из значений переменной data
        if ($fraction) {
            Log::channel('fraction_log')->info('Создана фракция', $data);
            return redirect()->route('fraction.index');
        }
        Log::channel('fraction_log')->error('Неудачная попытка создания', $data);
        return view('fraction.index')->withErrors([
            'formError' => 'errors!'
        ]);
    }

    public function show(Fraction $fraction)
    {
        //$characters = CharacterResource::collection($fraction->characters);
        $user = User::all();

        return view('fraction.show', compact('fraction', 'user'));
    }

    public function edit(Fraction $fraction)
    {
        return view('fraction.edit', compact('fraction'));
    }

    public function update(Fraction $fraction)
    {
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
        ]);

        $fraction->update($data);
        Log::channel('fraction_log')->info('Обновлена фракция', $data);
        return redirect()->route('fraction.show', $fraction->id);
    }

    public function destroy(Fraction $fraction)
    {
        $fraction->delete();
        Log::channel('fraction_log')->info('Удалина фракция', $fraction->toArray() );
        return redirect()->route('fraction.index');
    }
}
