<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Character;
use App\Models\Event;
use App\Models\Fraction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Fraction::factory(10)->create();
        $events = Event::factory(30)->create();
        $characters = Character::factory(100)->create();

        foreach ($characters as $character) {
            $eventsIds = $events->random(5)->pluck('id');
            $character->events()->attach($eventsIds);
        }
    }
}
