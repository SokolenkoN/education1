<?php
namespace App\Filters;

class CharacterFilter extends QueryFilter
{
    public function fraction_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('fraction_id', $id);
        });
    }

    public function name($name = ''){
        return $this->builder
            ->where('name', 'LIKE', '%'.$name.'%');
    }
}
