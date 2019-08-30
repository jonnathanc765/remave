<?php

use Illuminate\Database\Seeder;
use App\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::truncate();
        State::create([
            'name' => 'Amazonas',
        ]);
        State::create([
            'name' => 'Anzoátegui',
        ]);
        State::create([
            'name' => 'Apure',
        ]);
        State::create([
            'name' => 'Aragua',
        ]);
         State::create([
            'name' => 'Barinas',
        ]);
        State::create([
            'name' => 'Bolívar',
        ]);
         State::create([
            'name' => 'Carabobo',
        ]);
         State::create([
            'name' => 'Cojedes',
        ]);
        State::create([
            'name' => 'Delta Amacuro',
        ]);
         State::create([
            'name' => 'Distrito Capital',
        ]);
         State::create([
            'name' => 'Falcón',
        ]);
         State::create([
            'name' => 'Guárico',
        ]);
         State::create([
            'name' => 'Lara',
        ]);
        State::create([
            'name' => 'Mérida',
        ]);
         State::create([
            'name' => 'Miranda',
        ]);
         State::create([
            'name' => 'Monagas',
        ]);
         State::create([
            'name' => 'Nueva Esparta',
        ]);
        State::create([
            'name' => 'Portuguesa',
        ]);
         State::create([
            'name' => 'Sucre',
        ]);
         State::create([
            'name' => 'Táchira',
        ]);
         State::create([
            'name' => 'Trujillo',
        ]);
         State::create([
            'name' => 'Vargas',
        ]);
         State::create([
            'name' => 'Yaracuy',
        ]);
        State::create([
            'name' => 'Zulia',
        ]);
    }
}
