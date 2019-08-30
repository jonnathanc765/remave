<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Shop::truncate();
        App\Banner::truncate();
        Storage::deleteDirectory('public/logos');
        Storage::deleteDirectory('public/banners');
        $provider = App\User::whereEmail('proveedor@gmail.com')->first();

           
        $shop = factory(App\Shop::class)->create([
            'user_id' => $provider->id
        ]);

        factory(App\Banner::class)->create([
            'shop_id' => $shop->id,
        ]);
 
        factory(App\Shop::class, 10)->create()->each(function ($shop){
            factory(App\Banner::class)->create([
                'shop_id' => $shop->id,
            ]);
        });
    }
}
