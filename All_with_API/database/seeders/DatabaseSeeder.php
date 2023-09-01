<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Admin;
use App\Models\Order;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Category::factory()->count(10)->create();
        Product::factory()->count(50)->create();
        Admin::factory()->count(1)->create();
        Order::factory()->count(20)->create();
        User::factory()->count(30)->create();
    }
}
