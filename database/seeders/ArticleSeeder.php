<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
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
        $users = User::pluck('id')->toArray();
        $categories = Category::pluck('id')->toArray();
        while ($i < 20) {

            DB::table("articles")->insert([
                "title" => $faker->text(10),
                "content" => $faker->text(1000),
                "image_name" => 'about-0'.rand(1,5).'.jpg',
                "description" => $faker->text(100),
                'user_id' => $faker->randomElement($users),
                'category_id' => $faker->randomElement($categories),
            ]);
            $i++;
        }

    }
}
