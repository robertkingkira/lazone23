<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Laptops', 'slug' => 'laptops', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Desktops', 'slug' => 'desktops', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cameras', 'slug' => 'cameras', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cereals', 'slug' => 'cereals', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
