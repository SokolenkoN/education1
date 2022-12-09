<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'id',
        'title',
    ];
    public function characters() {
        return $this->belongsToMany(Character::class, 'character_events', 'event_id', 'character_id');
    }
}
