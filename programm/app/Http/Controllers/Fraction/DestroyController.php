<?php

namespace App\Http\Controllers\Fraction;

use App\Http\Controllers\Controller;
use App\Models\Fraction;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    public function __invoke(Fraction $fraction)
    {
        $fraction->delete();

        Log::channel('fraction_log')->info('Удалена фракция', $fraction->toArray());

        return redirect()->route('fraction.index');
    }
}
