<?php

use App\Configuration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class CredentialsTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

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

        Configuration::truncate();
        /**
         * Credenciales de prueba de Torres
         */
        Configuration::create([
            'name'  => 'app_id',
            'value' => '5324072234534048',
        ]);
        Configuration::create([
            'name'  => 'secret_token',
            'value' => 'nvWYBVuVvmmvViWW4Zbe838o8xJaAfSp',
        ]);

        // Configuracion Meta SEO
        Configuration::create([
            'name'  => 'meta-robots',
            'value' => 'index, follow',
        ]);
        Configuration::create([
            'name'  => 'meta-author',
            'value' => 'Pedro Peréz',
        ]);
        Configuration::create([
            'name'  => 'meta-subject',
            'value' => 'Ecommerce para la venta de repustos para vehiculos',
        ]);
        Configuration::create([
            'name'  => 'meta-keyword',
            'value' => 'palabres claves del sitio',
        ]);
        Configuration::create([
            'name'  => 'meta-title',
            'value' => 'Ecommerce',
        ]);

        // Configuracion de redes sociales
        Configuration::create([
            'name'  => 'Facebook',
            'value' => 'www.facebook.com',

        ]);
        Configuration::create([
            'name'  => 'Instagram',
            'value' => 'www.instagram.com',
        ]);
        Configuration::create([
            'name'  => 'Google+',
            'value' => 'www.google.co.ve',
        ]);

        Configuration::create([
            'name'  => 'LinkedIn',
            'value' => 'www.linkedIn.com',
        ]);
        Configuration::create([
            'name'  => 'Twitter',
            'value' => 'www.twitter.com',
        ]);

        Configuration::create([
            'name'  => 'Pinterest',
            'value' => 'www.pinterest.com',
        ]);

        Configuration::create([
            'name'  => 'Telefono',
            'value' => '04163559590',
        ]);

        Configuration::create([
            'name' => 'Email',
            'value' => 'Remaveshopss@gmail.com',
        ]);

        Configuration::create([
            'name' => 'Direccion',
            'value' => 'Barquisimeto, Lara',
        ]);

        // Configuracion de Banners
        Configuration::create([
            'name'  => 'centralHighBannerHigh',
            'value' => '6',
        ]);
        Configuration::create([
            'name'  => 'centralLowBannerLimit',
            'value' => '4',
        ]);
        Configuration::create([
            'name'  => 'principalBannerLimit',
            'value' => '4',
        ]);
        Configuration::create([
            'name'  => 'categoryBannerLimit',
            'value' => '4',
        ]);

        // Configuracion de Comisiones y Pagos
        Configuration::create([
            'name'  => 'comision',
            'value' => '3',
        ]);

        // Letrero de informacion para el homepage
        Configuration::create([
           'name' => 'information',
            'value' => 'Actualmente estamos trabajando en todas nuestras tiendas en Barqisimeto estado Lara ',
        ]);

        // Letrero de informacion para el homepage
        Configuration::create([
            'name' => 'mission',
            'value' => 'REMAVECA, es una empresa familiar, establecida en Barquisimeto, estado Lara hace unos 12 años. Se inició como un detal especializado en repuestos automotrices, hasta llegar a ser una red de tiendas minoristas en el occidente del país y ventas al mayor a todo el territorio nacional. Con un portafolio de más de 3.000 ítems, de los cuales, aproximadamente el 95%, son importados por la empresa. Esto nos permite ofrecer excelentes condiciones a todos nuestros clientes',
        ]);

        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ZonesTableSeeder::class);


        $eduar = factory(User::class)->create([
            'name' => 'Wilmer mendoza',
            'email' => 'Remaveshopss@gmail.com',
            'email_verified_at' => Carbon\Carbon::now(),
        ]);

        $eduar->assignRole('superadmin');

        $john = factory(User::class)->create([
            'name' => 'John Doe',
            'email' => 'client@gmail.com',
            'email_verified_at' => Carbon\Carbon::now(),
        ]);

        $john->assignRole('client');

        $provider = factory(User::class)->create([
            'name' => 'Provider',
            'email' => 'provider@gmail.com',
            'email_verified_at' => Carbon\Carbon::now(),
        ]);

        $shop = factory(App\Shop::class)->create([
            'user_id'       => $provider->id,
            'access_token'  => str_random(20),
            'public_key'    => str_random(20),
            'pay_user_id'   => rand(1000, 20000),
            'refresh_token' => str_random(20),
        ]);

        factory(App\Banner::class)->create([
            'shop_id' => $shop->id,
        ]);

        $provider->assignRole('provider');

        $pedro = factory(User::class)->create([
            'name' => 'Pedro peres',
            'email' => 'pedro@gmail.com',
            'email_verified_at' => Carbon\Carbon::now(),
        ]);
          $shop = factory(App\Shop::class)->create([
            'user_id'       => $pedro->id,
            'access_token'  => str_random(20),
            'public_key'    => str_random(20),
            'pay_user_id'   => rand(1000, 20000),
            'refresh_token' => str_random(20),
        ]);
         $pedro->assignRole('provider');

          $marcos = factory(User::class)->create([
            'name' => 'marcos peres',
            'email' => 'marcos@gmail.com',
            'email_verified_at' => Carbon\Carbon::now(),
        ]);
          $shop = factory(App\Shop::class)->create([
            'user_id'       => $marcos->id,
            'access_token'  => str_random(20),
            'public_key'    => str_random(20),
            'pay_user_id'   => rand(1000, 20000),
            'refresh_token' => str_random(20),
        ]);
         $marcos->assignRole('provider');

         $juan = factory(User::class)->create([
            'name' => 'juan peres',
            'email' => 'juan@gmail.com',
            'email_verified_at' => Carbon\Carbon::now(),
        ]);
          $shop = factory(App\Shop::class)->create([
            'user_id'       => $juan->id,
            'access_token'  => str_random(20),
            'public_key'    => str_random(20),
            'pay_user_id'   => rand(1000, 20000),
            'refresh_token' => str_random(20),
        ]);
         $juan->assignRole('provider');

          $lucas = factory(User::class)->create([
            'name' => 'lucas peres',
            'email' => 'lucas@gmail.com',
            'email_verified_at' => Carbon\Carbon::now(),
        ]);
          $shop = factory(App\Shop::class)->create([
            'user_id'       => $lucas->id,
            'access_token'  => str_random(20),
            'public_key'    => str_random(20),
            'pay_user_id'   => rand(1000, 20000),
            'refresh_token' => str_random(20),
        ]);
         $lucas->assignRole('provider');

          $mateo = factory(User::class)->create([
            'name' => 'mateo peres',
            'email' => 'mateo@gmail.com',
            'email_verified_at' => Carbon\Carbon::now(),
        ]);
          $shop = factory(App\Shop::class)->create([
            'user_id'       => $mateo->id,
            'access_token'  => str_random(20),
            'public_key'    => str_random(20),
            'pay_user_id'   => rand(1000, 20000),
            'refresh_token' => str_random(20),
        ]);
         $mateo->assignRole('provider');


          $pablo = factory(User::class)->create([
            'name' => 'pablo peres',
            'email' => 'pablo@gmail.com',
            'email_verified_at' => Carbon\Carbon::now(),
        ]);
          $shop = factory(App\Shop::class)->create([
            'user_id'       => $pablo->id,
            'access_token'  => str_random(20),
            'public_key'    => str_random(20),
            'pay_user_id'   => rand(1000, 20000),
            'refresh_token' => str_random(20),
        ]);
         $pablo->assignRole('provider');

          $jose = factory(User::class)->create([
            'name' => 'jose peres',
            'email' => 'jose@gmail.com',
            'email_verified_at' => Carbon\Carbon::now(),
        ]);
          $shop = factory(App\Shop::class)->create([
            'user_id'       => $jose->id,
            'access_token'  => str_random(20),
            'public_key'    => str_random(20),
            'pay_user_id'   => rand(1000, 20000),
            'refresh_token' => str_random(20),
        ]);
         $jose->assignRole('provider');

        Schema::enableForeignKeyConstraints();
    }
}
