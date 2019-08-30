<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::truncate();
        App\SubCategory::truncate();

        factory(App\Category::class, 15)->create()->each(function ($category) {
            factory(App\SubCategory::class, rand(50, 52))->create([
                'category_id' => $category->id
            ]);
        });

        // factory(App\Category::class)->create([
        //     'published' => 1,
        //     'name' => 'Mujeres'
        // ]);
        // factory(App\Category::class)->create([
        //     'published' => 1,
        //     'name' => 'Niños'
        // ]);
        // factory(App\Category::class)->create([
        //     'published' => 1,
        //     'name' => 'Computacion'
        // ]);
        // factory(App\Category::class)->create([
        //     'published' => 1,
        //     'name' => 'Smartphone'
        // ]);
        // factory(App\Category::class)->create([
        //     'published' => 1,
        //     'name' => 'Belleza'
        // ]);
    }
}
