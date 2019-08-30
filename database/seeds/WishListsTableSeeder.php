<?php

use Illuminate\Database\Seeder;

class WishListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\WishList::truncate();
        factory(App\WishList::class, 50)->create();
    }
}
