<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::query()->orderBy('id', 'ASC')->get(); //присвоеть переменной значения модели и вызвать все сущности модели из бд


        return view('home', compact('events'));
    }
}
