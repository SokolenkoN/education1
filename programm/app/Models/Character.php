<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
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
        'user_id',
    ];

    public function fraction() {
        return $this->belongsTo(Fraction::class);
    }
    public function events() {
        return $this->belongsToMany(Event::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
