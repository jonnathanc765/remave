<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Order::truncate();
        App\OrderDetail::truncate();
        factory(App\Order::class, 100)->create()->each(function ($order) {
            factory(App\OrderDetail::class, rand(1, 4))->create(['order_id' => $order->id,]);
        });
    }
}
