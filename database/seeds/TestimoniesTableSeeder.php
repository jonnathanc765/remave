<?php

use Illuminate\Database\Seeder;

class TestimoniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Testimonie::truncate();
        factory(App\Testimonie::class, 50)->create();
    }
}
