<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Http\Requests\Character\StoreRequest;
use App\Models\Character;
use Illuminate\Http\Request;

class  StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('character.index');
    }
}

