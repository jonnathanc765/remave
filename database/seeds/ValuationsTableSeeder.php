<?php

use Illuminate\Database\Seeder;

class ValuationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Valuation::class, 50)->create();
    }
}
