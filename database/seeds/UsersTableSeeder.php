<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Gloudemans\Shoppingcart\Cart;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            DB::table('roles')->truncate();
            DB::table('model_has_roles')->truncate();
            DB::table('permissions')->truncate();
            App\User::truncate();
            App\UserDetail::truncate();
            App\Shop::truncate();
            App\Banner::truncate();
            App\Post::truncate();
            App\Comment::truncate();
            App\Product::truncate();
            App\Order::truncate();
            App\OrderDetail::truncate();
            App\ProductImage::truncate();

            Storage::deleteDirectory('public/products');
            Storage::deleteDirectory('public/avatars');
            Storage::deleteDirectory('public/banners');

            // Create a superadmin role for the admins users
            $admin = Role::create(['guard_name' => 'web', 'name' => 'superadmin']);
            // Create a provider role for the proveedor users
            $provider = Role::create(['guard_name' => 'web', 'name' => 'provider']);
            // Create a client role for the clientes users
            $client = Role::create(['guard_name' => 'web', 'name' => 'client']);

            // Define a `publish articles` permission for the admin users belonging to the admin guard
            $publishProducts = Permission::create(['guard_name' => 'web', 'name' => 'publicar productos']);

            $registerShop = Permission::create(['guard_name' => 'web', 'name' => 'registrar tienda']);

            $permission = Permission::create(['guard_name' => 'web', 'name' => 'ver productos']);

            $eduar = factory(App\User::class)->create([
                'name'              => 'Eduar Bastidas',
                'email'             => 'eduarbastidas10@gmail.com',
                'email_verified_at' => now(),
                'deleted_at'        => null,
            ]);

            factory(App\UserDetail::class)->create([
                'user_id' => $eduar->id,
            ]);

            $jonna = factory(App\User::class)->create([
                'name'              => 'Jonnathan Carrasco',
                'email'             => 'jonna@gmail.com',
                'password'          => bcrypt(123456),
                'email_verified_at' => '2019-02-13 00:00:00',
            ]);

            $adrian = factory(App\User::class)->create([
                'name'       => 'Adrian Guerrero',
                'email'      => 'ajgl@nuke.africa',
                'password'   => 'bcrypt(123456)',
                'deleted_at' => null,
            ]);

            $jose = factory(App\User::class)->create([
                'name'              => 'Jose Torres',
                'email'             => 'jose@gmail.com',
                'password'          => bcrypt(123456),
                'email_verified_at' => now(),
            ]);

            $hemberth = factory(App\User::class)->create([
                'name'     => 'hemberth Medina',
                'email'    => 'medina@gmail.com',
                'password' => bcrypt(123456),
            ]);

            $cliente = factory(App\User::class)->create([
                'name'              => 'John Doe',
                'email'             => 'client@gmail.com',
                'deleted_at'        => null,
                'email_verified_at' => '2019-02-13 00:00:00',
            ]);

            $proveedor = factory(App\User::class)->create([
                'name'              => 'Usuario Proveedor',
                'email'             => 'provider@gmail.com',
                'deleted_at'        => null,
                'email_verified_at' => '2019-02-13 00:00:00',
            ]);

            factory(App\UserDetail::class)->create([
                'user_id' => $proveedor->id,
            ]);

            $hemberth->assignRole($admin);

            $jonna->assignRole($admin);

            $eduar->assignRole($admin);

            $jose->assignRole($client)->givePermissionTo($registerShop);

            $cliente->assignRole($client)->givePermissionTo($registerShop);

            $proveedor->assignRole($provider);

            $shop = factory(App\Shop::class)->create([
                'user_id'       => $proveedor->id,
                'access_token'  => str_random(20),
                'public_key'    => str_random(20),
                'pay_user_id'   => rand(1000, 20000),
                'refresh_token' => str_random(20),
            ]);

            factory(App\Banner::class)->create([
                'shop_id' => $shop->id,
            ]);

            factory(App\User::class, 20)->create()->each(function ($user) {
                factory(App\UserDetail::class)->create([
                    'user_id' => $user->id,
                ]);
                
                if (rand(0, 100) > 40) {
                    $user->assignRole('client')->save();
                } else {
                    $user->assignRole('provider');
                    $user->email_verified_at = now();
                    $user->save();

                    $shop = factory(App\Shop::class)->create([
                        'user_id' => $user->id,
                    ]);

                    factory(App\Banner::class)->create([
                        'shop_id' => $shop->id,
                    ]);

                    factory(App\Post::class, rand(1, 10))->create([
                        'shop_id' => $shop->id,
                    ])->each(function ($post) {

                        factory(App\Comment::class, rand(0, 5))->create([
                            'post_id' => $post->id,
                        ]);

                        factory(App\Product::class, rand(1, 3))->create([
                            'post_id' => $post->id,
                        ])->each(function ($product) {

                            factory(App\ProductImage::class, rand(1, 5))->create(['product_id' => $product->id]);

                            factory(App\Order::class, rand(0, 5))->create()->each(function ($order) {
                                factory(App\OrderDetail::class, rand(1, 4))->create([
                                    'order_id' => $order->id,
                                ]);
                            });
                        });
                    });
                }
            });

            $userShop = factory(App\User::class)->create([
                'name'              => 'User WithShop',
                'email'             => 'with@gmail.com',
                'deleted_at'        => null,
                'email_verified_at' => '2019-02-13 00:00:00',
            ]);

            $userShop->assignRole($client)->givePermissionTo($registerShop);

            $userShop->assignRole($provider);

            $shop = factory(App\Shop::class)->create([
                'user_id' => $userShop->id,
                'access_token'      => '54654654',
                'public_key'      => '54654654',
                'pay_user_id'      => '54654654',
                'refresh_token'      => '54654654',
            ]);

            factory(App\Banner::class)->create([
                'shop_id' => $shop->id,
            ]);

            factory(App\Post::class, rand(2, 5))->create([
                'shop_id' => $shop,
            ])->each(function ($post) {
                factory(App\Comment::class, rand(3, 10))->create([
                    'post_id' => $post->id,
                ]);

                factory(App\Product::class, rand(1, 3))->create([
                    'post_id' => $post->id,
                ])->each(function ($product) {

                    factory(App\ProductImage::class, rand(1, 3))->create(['product_id' => $product->id]);

                    factory(App\Order::class, rand(1, 10))->create()->each(function ($order) {

                        factory(App\OrderDetail::class, rand(1, 4))->create([
                            'order_id' => $order->id,
                        ]);
                    });
                });

            });
        } else {
            DB::table('roles')->truncate();
            DB::table('model_has_roles')->truncate();
            DB::table('permissions')->truncate();
            App\User::truncate();
            // Create a superadmin role for the admins users
            $admin = Role::create(['guard_name' => 'web', 'name' => 'superadmin']);
            // Create a provider role for the proveedor users
            $provider = Role::create(['guard_name' => 'web', 'name' => 'provider']);
            // Create a client role for the clientes users
            $client = Role::create(['guard_name' => 'web', 'name' => 'client']);

            $publishProducts = Permission::create(['guard_name' => 'web', 'name' => 'publicar productos']);

            $registerShop = Permission::create(['guard_name' => 'web', 'name' => 'registrar tienda']);

            $permission = Permission::create(['guard_name' => 'web', 'name' => 'ver productos']);

            $user = factory(App\User::class)->create([
                'name'              => 'Adrian',
                'email'             => 'admin@mishopp.com',
                'email_verified_at' => now(),
                'avatar'            => null,
                'created_at'        => now(),
                'updated_at'        => now(),
                'deleted_at'        => null,
            ]);

            $user->assignRole($admin);
        }

    }
}
