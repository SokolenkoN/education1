<?php


namespace App\Services\Character;


use App\Models\Character;
use http\Encoding\Stream\Debrotli;

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

    public function update($character, $data)
    {
        if (isset($data['health'])) {
            $data['health'] = 'Жив';
        } else {
            $data['health'] = 'Мёртв';
        }
        $character->update($data);
    }
}
