<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gift;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gift::create([
            'name' => 'Gift 1',
            'price' => 10.00,
            'status' => true,
            'rating' => 4.5,
            'cover' => '/gifts/1.jpg',
            'description' => 'Description for Gift 1',
        ]);

        Gift::create([
            'name' => 'Gift 2',
            'price' => 20.00,
            'status' => false,
            'rating' => 3.0,
            'cover' => '/gifts/2.jpg',
            'description' => 'Description for Gift 2',
        ]);

        Gift::create([
            'name' => 'Gift 3',
            'price' => 30.00,
            'status' => true,
            'rating' => 5.0,
            'cover' => '/gifts/3.jpg',
            'description' => 'Description for Gift 3',
        ]);
    }
}
