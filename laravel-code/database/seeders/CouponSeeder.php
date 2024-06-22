<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat beberapa contoh coupon
        Coupon::create([
            'code' => 'SUMMER25',
            'isPercentage' => true,
            'description' => 'Summer Sale 25% off',
            'isActive' => true,
            'expiryDate' => now()->addMonths(3)->format('Y-m-d'),
            'discount' => 25,
            'minimumOrderAmount' => 0,
        ]);

        Coupon::create([
            'code' => 'WELCOME10',
            'isPercentage' => false,
            'description' => 'Welcome Discount Rp 10.000 off',
            'isActive' => true,
            'expiryDate' => now()->addMonths(6)->format('Y-m-d'),
            'discount' => 10,
            'minimumOrderAmount' => 0.00,
        ]);

        Coupon::create([
            'code' => 'FREESHIP10',
            'isPercentage' => true,
            'description' => 'Free Shipping 10% on Orders over Rp 100.000',
            'isActive' => true,
            'expiryDate' => now()->addMonths(12)->format('Y-m-d'),
            'discount' => 10,
            'minimumOrderAmount' => 100.00,
        ]);
    }
}
