<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake();

        for ($i = 0; $i < 100; $i++) { // Create 100 fake posts
            Post::create([
                'title' => $faker->sentence,
                'image' => $faker->imageUrl(640, 480, 'house'),
                'category_id' => random_int(1, 3),
                'sub_category_id' => random_int(1, 5),
                'start_date' => $faker->dateTimeBetween('2023-07-01', '2023-07-31')->format('Y-m-d'),
                'end_date' => $faker->dateTimeBetween('2023-08-01', '2023-08-31')->format('Y-m-d'),
                'guests_allowed' => $faker->randomDigitNotNull,
            ]);
        }
    }
}
