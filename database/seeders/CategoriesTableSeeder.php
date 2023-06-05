<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\categories;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach (range(1, 200) as $index) {
            categories::create([
                'Name' => $faker->Name,
                'Description' => $faker->sentence,
            ]);
            
        }
    }
}

