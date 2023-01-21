<?php


namespace App\Services\Character;

use App\Models\Character;

class Service
{
    public function store($data)
    {

        if (isset($data['health'])) {
            $data['health'] = 'Жив';
        } else {
            $data['health'] = 'Мёртв';
        }

        $events = $data['events'];
        unset($data['events']);

        $character = Character::create($data); // создать сущности из значений переменной data
        $character->events()->attach($events);
    }

    public function update($character, $data) {
        if (isset($data['health'])) {
            $data['health'] = 'Жив';
        } else {
            $data['health'] = 'Мёртв';
        }
        $character->update($data);
    }

    public function filter($data, $characters) {
        if (isset($data['name'])) {
            $characters->where('name', 'like', "%{$data['name']}%");
        };

        if (isset($data['age'])) {
            $characters->where('age', '=', "{$data['age']}");
        };

        if (isset($data['fraction_id'])) {
            $characters->where('fraction_id', '=', "{$data['fraction_id']}");
        };
    }
}
