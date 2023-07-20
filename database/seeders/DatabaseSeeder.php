<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\SubCategory;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::insert(
            [
                [
                    'name' => 'Holiday Villa',
                ],
                [
                    'name' => 'Rental Villa',
                ],
                [
                    'name' => 'Villas for Sale',
                ],
            ]
        );

        SubCategory::insert(
            [
                [
                    'name' => 'Townhouse',
                ],
                [
                    'name' => 'Condo',
                ],
                [
                    'name' => 'Flat',
                ],
                [
                    'name' => 'Rowhouse',
                ],
                [
                    'name' => 'Villa',
                ],
            ]
        );

        $this->call(PostSeeder::class);
    }
}
