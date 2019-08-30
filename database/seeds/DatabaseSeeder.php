<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            Schema::disableForeignKeyConstraints();

            $this->call(CategoriesTableSeeder::class);
            $this->call(StatesTableSeeder::class);
            $this->call(CitiesTableSeeder::class);
            $this->call(ZonesTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(ConfigurationSeeder::class);
            $this->call(FaqSeeder::class);
            $this->call(HistoriesTableSeeder::class);
            $this->call(NotificationsTableSeeder::class);
            // $this->call(MessagesTableSeeder::class);
            $this->call(WishListsTableSeeder::class);
            // $this->call(ShopsTableSeeder::class);
            $this->call(ValuationsTableSeeder::class);
            

            Schema::enableForeignKeyConstraints();
        } else {
            Schema::disableForeignKeyConstraints();
            $this->call(UsersTableSeeder::class);
            $this->call(ConfigurationSeeder::class);
            $this->call(StatesTableSeeder::class);
            $this->call(CitiesTableSeeder::class);
            $this->call(ZonesTableSeeder::class);
            Schema::enableForeignKeyConstraints();
        }
    }
}
