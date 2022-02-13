<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $i = 0;
        while ($i < 20) {

            DB::table("categories")->insert([
                "name" => $faker->text(10),
            ]);
            $i++;
        }

    }
}
