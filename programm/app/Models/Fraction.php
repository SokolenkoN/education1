<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fraction extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'title',
        'description',
    ];

    public function characters() {
        return $this->hasMany(Character::class, 'fraction_id', 'id');
    }
}
