<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Ratings;
use App\Models\Review;
use App\Models\Sizes;
use App\Models\Categories;


class PrductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    Product::factory()
            ->count(50)
            ->create();

            Ratings::factory()
            ->count(50)
            ->create();

            Review::factory()
            ->count(50)
            ->create();

            Sizes::factory()
            ->count(50)
            ->create();

            Categories::factory()
            ->count(10)
            ->create();
            
}


}
