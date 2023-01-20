<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Event;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index(Character $character)
    {
//        $characters = Character::query();
//
//        $characters
//                    ->join('character_event', 'characters.id', '=', 'character_event.character_id')
//                    ->Join('fractions', 'fractions.id', '=', 'characters.fraction_id');
//
//        if (auth()->user()->role_id == 1)
//            $characters->where(function ($query) {
//              $query->where('character_event.event_id', '=', 10)
//                  ->where('health', '=', 'Мёртв')
//                  ->where('fractions.id', '=', 10);
//            });
//
//
//        $characters = Character::query()->with('fraction', 'events');
//
//        $characters
//            ->leftJoin('character_event', 'characters.id', '=', 'character_event.event_id')
//            ->leftJoin('fractions', 'fractions.id', '=', 'characters.fraction_id');
//
//        if (auth()->user()->role_id == 1)
//            $characters->where(function ($query) {
//                $query->whereHas('events', function ($q) {
//                    $q->where('events.id', '=', 1);
//                });
//                $query->where(function ($q) {
//                    $q->where(function ($q_special) {
//                        $q_special->where('health', '=', 'Мёртв')
//                            ->where('fractions.id', '=', 2);
//                    });
//                    $q->orWhere(function ($q_special) {
//                        $q_special->Where('health', '=', 'Жив')
//                            ->Where('name', '=', 'Vicky Durgan DDS');
//                    });
//
//                });
//            })->distinct('characters.id');
//
//////        $characters= $characters->get();
//         dd($characters->toSql());

        $events = Event::all();
        return view('home.home', compact('events'));
    }

}
