<?php

namespace App\Http\Controllers\Fraction;

use App\Http\Requests\Fraction\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('fraction.index');
    }
}
