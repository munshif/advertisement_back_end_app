<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advertisement::query()->truncate();
        for($count=0; $count < 50; $count++){
            Advertisement::insert([
                'title' => Str::random(10),
                'product_id' => rand(1, 10),
                'valid_until' => '2022-09-06',
                'discount_percentage' => 10,
                'created_at' => now()
            ]);
        }


    }
}
