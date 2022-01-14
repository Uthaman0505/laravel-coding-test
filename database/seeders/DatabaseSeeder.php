<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            $name = $faker->name;
            DB::table('events')->insert([
                'id' => $faker->uuid(),
                'name' => $name,
                'slug' => Str::slug($name, '-')
            ]);
        }
    }
}
