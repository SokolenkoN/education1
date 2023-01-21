<?php

namespace App\Http\Controllers\Character;

use App\Http\Requests\Character\StoreRequest;

class  StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.character');
    }
}

