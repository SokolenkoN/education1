<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
    ];

    public function characters() {
        return $this->hasMany(Character::class);
    }
}
