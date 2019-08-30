<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 10)->create()->each(function ($product) {

            factory(App\DetailProduct::class, rand(1,3))->create(['product_id' => $product->id])->each(function ($detail) {
                factory(App\ProductImage::class)->create(['detail_product_id' => $detail->id]);
            });

            factory(App\Post::class)->create(['product_id' => $product->id])->each(function ($post) {
                factory(App\Comment::class, rand(1, 5))->create(['post_id' => $post->id]);
            });
        });
    }
}
