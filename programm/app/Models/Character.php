<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'age',
        'biography',
        'obituary',
        'health',
        'fraction_id',
    ];

    public function fraction() {
        return $this->belongsTo(Fraction::class, 'fraction_id', 'id');
    }

    public function events() {
        return $this->belongsToMany(Event::class, 'character_events', 'character_id', 'event_id');
    }
}

