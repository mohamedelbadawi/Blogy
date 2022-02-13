<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
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
            DB::table("tags")->insert([
                "name" => $faker->text(10),
            ]);
            $i++;
        }
        $tags = Tag::all();
        Article::all()->each(function ($article) use ($tags) {
            $article->tag()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
