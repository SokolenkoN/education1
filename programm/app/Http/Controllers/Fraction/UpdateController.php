<?php

namespace App\Http\Controllers\Fraction;

use App\Http\Requests\Fraction\UpdateRequest;
use App\Models\Fraction;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Fraction $fraction)
    {
        $data = $request->validated();

        $this->service->update($fraction, $data);

        return redirect()->route('fraction.show', $fraction->id);
    }
}
