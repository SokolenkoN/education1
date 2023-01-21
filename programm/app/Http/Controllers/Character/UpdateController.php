<?php

namespace App\Http\Controllers\Character;

use App\Http\Requests\Character\UpdateRequest;
use App\Models\Character;

class  UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Character $character)
    {
        $data = $request->validated();

        $this->service->update($character, $data);

        return redirect()->route('character.show', $character->id);
    }
}

