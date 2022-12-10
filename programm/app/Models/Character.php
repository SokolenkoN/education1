<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
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
        return $this->belongsTo(Fraction::class);
    }
    public function events() {
        return $this->belongsToMany(Event::class);
    }
}
