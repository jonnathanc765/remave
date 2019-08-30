<?php

use Illuminate\Database\Seeder;

class HistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\History::truncate();
        factory(App\History::class, 50)->create();
    }
}
