<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
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
            DB::table("contacts")->insert([
                "name" => $faker->name(),
                "subject" => $faker->text(10),
                "email" => $faker->safeEmail(),
                "message" => $faker->text(100),
            ]);
            $i++;
        }
    }
}
