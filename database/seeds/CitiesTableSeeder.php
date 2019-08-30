<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();
        City::create([
            'state_id' => 1,
            'name'     => 'Puerto Ayacucho',
        ]);
          City::create([
            'state_id' => 2,
            'name'     => 'Barcelona',
        ]);
        City::create([
            'state_id' => 3,
            'name'     => 'San Fernando de Apure',
        ]);
        City::create([
            'state_id' => 4,
            'name'     => 'Maracay',
        ]);
        City::create([
            'state_id' => 5,
            'name'     => 'Barinas',
        ]);
       City::create([
            'state_id' => 6,
            'name'     => 'Ciudad Bolívar',
        ]);
        City::create([
            'state_id' => 7,
            'name'     => 'Valencia',
        ]);
         City::create([
            'state_id' => 8,
            'name'     => 'San Carlos',
        ]);
          City::create([
            'state_id' => 9,
            'name'     => 'Tucupita',
        ]);
          City::create([
            'state_id' => 10,
            'name'     => 'Caracas',
        ]);
        City::create([
            'state_id' => 11,
            'name'     => 'Coro',
        ]);
          City::create([
            'state_id' => 12,
            'name'     => 'San Juan de los Morros',
        ]);
          City::create([
            'state_id' => 13,
            'name'     => 'Barquisimeto',
        ]);
          City::create([
            'state_id' => 14,
            'name'     => 'Mérida',
        ]);
          City::create([
            'state_id' => 15,
            'name'     => ' Los Teques',
        ]);
          City::create([
            'state_id' => 16,
            'name'     => 'Maturín',
        ]);
          City::create([
            'state_id' => 17,
            'name'     => ' La Asunción',
        ]);
          City::create([
            'state_id' => 18,
            'name'     => 'Guanare',
        ]);
          City::create([
            'state_id' => 19,
            'name'     => 'Cumaná',
        ]);
          City::create([
            'state_id' => 20,
            'name'     => 'San Cristóbal',
        ]);
          City::create([
            'state_id' => 21,
            'name'     => 'Trujillo',
        ]);
          City::create([
            'state_id' => 22,
            'name'     => 'La Guaira',
        ]);
          City::create([
            'state_id' => 23,
            'name'     => 'San Felipe',
        ]);
          City::create([
            'state_id' => 24,
            'name'     => 'Maracaibo',
        ]);                    
    }
}
