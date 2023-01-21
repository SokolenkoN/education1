<?php


namespace App\Services\Fraction;

use App\Models\Fraction;
use Illuminate\Support\Facades\Log;

class Service
{
    public function store($data)
    {
        $fraction = Fraction::create($data);

        if ($fraction) {
            Log::channel('fraction_log')->info('Создана фракция', $data);
            return redirect()->route('fraction.index');
        }
        Log::channel('fraction_log')->error('Неудачная попытка создания', $data);
        return view('fraction.create')->withErrors([
            'formError' => 'Не верные данные!'
        ]);
    }

    public function update($fraction, $data)
    {
        $fraction->update($data);

        if ($fraction) {
            Log::channel('fraction_log')->info('Обновлена фракйия', $data);
            return redirect()->route('fraction.index');
        }
        Log::channel('fraction_log')->error('Неудачная попытка создания', $data);
        return view('fraction.edit')->withErrors([
            'formError' => 'Не верные данные!'
        ]);
    }
}
