<?php


namespace App\Http\Resources;

use App\Models\Fraction;
use Illuminate\Http\Resources\Json\JsonResource;
class FractionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'characters' => CharacterResource::collection($this->characters),
        ];
    }
}
