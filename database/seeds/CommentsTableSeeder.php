<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $provider = App\User::whereEmail('proveedor@gmail.com')->first();

        App\Comment::truncate();
        factory(App\Comment::class, 25)->create();
        factory(App\Comment::class, 5)->create([
            'post_id' => $provider->id
        ]);

    }
}
