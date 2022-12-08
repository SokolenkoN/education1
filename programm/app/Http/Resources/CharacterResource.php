<?php


namespace App\Http\Resources;

use App\Models\Character;
use Illuminate\Http\Resources\Json\JsonResource;
class CharacterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'biography' => $this->biography,
            'obituary' => $this->obituary,
            'health' => $this->health,
            'fraction' => new FractionResource($this->fraction),
        ];
    }
}
