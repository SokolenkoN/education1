<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class SocialsController extends Controller
{
    public function index()
    {
        return view('socials');
    }
}
