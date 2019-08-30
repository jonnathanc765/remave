<?php

use Illuminate\Database\Seeder;
use App\Zone;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::truncate();
        
        Zone::create([
            'city_id' => 1,
            'name' => 'Atures'
        ]);

        Zone::create([
            'city_id' => 1,
            'name' => 'Alto Orinoco',
        ]);
        Zone::create([
            'city_id' => 1,
            'name' => 'Atabapo'
        ]);

        Zone::create([
            'city_id' => 1,
            'name' => 'Autana',
        ]);
        Zone::create([
            'city_id' => 1,
            'name' => 'Manapiare'
        ]);

        Zone::create([
            'city_id' => 1,
            'name' => 'Maroa',
        ]);
        Zone::create([
            'city_id' => 1,
            'name' => 'Río Negro',
        ]);
        
        Zone::create([
            'city_id' => 2,
            'name' => 'Simón Bolívar',
        ]);
        Zone::create([
            'city_id' => 2,
            'name' => 'Anaco',
        ]);
        Zone::create([
            'city_id' => 2,
            'name' => 'Aragua',
        ]);
        Zone::create([
            'city_id' => 2,
            'name' => 'Diego Bautista Urbaneja',
        ]);
        Zone::create([
            'city_id' => 2,
            'name' => ' Fernando de Peñalver',
        ]);
        Zone::create([
            'city_id' => 2,
            'name' => 'Francisco del Carmen Carvajal',
        ]);
        Zone::create([
            'city_id' => 2,
            'name' => 'Francisco de Miranda',
        ]);
        Zone::create([
            'city_id' => 2,
            'name' => 'Guanta',
        ]);
        Zone::create([
            'city_id' => 3,
            'name' => 'San Fernando',
        ]);
        Zone::create([
            'city_id' => 3,
            'name' => 'Achaguas',
        ]);
        Zone::create([
            'city_id' => 3,
            'name' => 'Biruaca',
        ]);
        Zone::create([
            'city_id' => 3,
            'name' => 'Muñoz',
        ]);
        Zone::create([
            'city_id' => 3,
            'name' => 'Páez',
        ]);
        Zone::create([
            'city_id' => 3,
            'name' => 'Pedro Camejo',

        ]);
        Zone::create([
            'city_id' => 3,
            'name' => 'Rómulo Gallegos',
        ]);
         Zone::create([
            'city_id' => 4,
            'name' => 'Girardot',
        ]);
          Zone::create([
            'city_id' => 4,
            'name' => 'Bolívar',
        ]);
           Zone::create([
            'city_id' => 4,
            'name' => 'Camatagua',
        ]);
            Zone::create([
            'city_id' => 4,
            'name' => 'Francisco Linares Alcántara',
        ]);
             Zone::create([
            'city_id' => 4,
            'name' => 'José Ángel Lamas',
        ]);
              Zone::create([
            'city_id' => 4,
            'name' => 'José Félix Ribas',
        ]);
               Zone::create([
            'city_id' => 4,
            'name' => 'José Rafael Revenga',
        ]);
                Zone::create([
            'city_id' => 4,
            'name' => ' Libertador',
        ]);
          Zone::create([
            'city_id' => 4,
            'name' => 'Mario Briceño Iragorry',
        ]);
         Zone::create([
            'city_id' => 4,
            'name' => 'Ocumare',
        ]);
         Zone::create([
            'city_id' => 4,
            'name' => 'San Casimiro',
        ]);
         Zone::create([
            'city_id' => 4,
            'name' => 'San Sebastián',
        ]);
         Zone::create([
            'city_id' => 4,
            'name' => 'Santiago Mariño',
        ]);
         Zone::create([
            'city_id' => 4,
            'name' => 'Santos Michelena',
        ]);
         Zone::create([
            'city_id' => 4,
            'name' => 'Sucre',
        ]);
         Zone::create([
            'city_id' => 4,
            'name' => 'Tovar',
        ]);
         Zone::create([
            'city_id' => 4,
            'name' => 'Urdaneta',
        ]);
         Zone::create([
            'city_id' => 4,
            'name' => 'Zamora',
        ]);
        Zone::create([
            'city_id' => 5,
            'name' => 'Barinas',
        ]); 
        Zone::create([
            'city_id' => 5,
            'name' => 'Andrés Eloy Blanco',
        ]);
        Zone::create([
            'city_id' => 5,
            'name' => 'Arismendi',
        ]);
       Zone::create([
            'city_id' => 5,
            'name' => 'Alberto Arvelo Torrealba',
        ]);
       Zone::create([
            'city_id' => 5,
            'name' => 'Antonio José de Sucre',
        ]);        
       Zone::create([
            'city_id' => 5,
            'name' => 'Bolívar',
        ]);
       Zone::create([
            'city_id' => 5,
            'name' => 'Cruz Paredes',
        ]);
       Zone::create([
            'city_id' => 5,
            'name' => 'Ezequiel Zamora',
        ]);
       Zone::create([
            'city_id' => 5,
            'name' => 'Sosa',
        ]);
       Zone::create([
            'city_id' => 5,
            'name' => 'Rojas',
        ]);
       Zone::create([
            'city_id' => 5,
            'name' => 'Obispos',
        ]);
       Zone::create([
            'city_id' => 5,
            'name' => 'Pedraza',
        ]);
        Zone::create([
            'city_id' => 6,
            'name' => 'Angostura',
        ]);
        Zone::create([
            'city_id' => 6,
            'name' => 'Caroní',
        ]);
        Zone::create([
            'city_id' => 6,
            'name' => 'Cedeño',
        ]);
        Zone::create([
            'city_id' => 6,
            'name' => 'Chien',
        ]);
        Zone::create([
            'city_id' => 6,
            'name' => 'El Callao',
        ]);
        Zone::create([
            'city_id' => 6,
            'name' => 'Gran Sabana',
        ]);
        Zone::create([
            'city_id' => 6,
            'name' => 'Heres',
        ]);
        Zone::create([
            'city_id' => 6,
            'name' => 'Piar',
        ]);
        Zone::create([
            'city_id' => 6,
            'name' => 'Roscio',
        ]);
        Zone::create([
            'city_id' => 6,
            'name' => 'Sifontes',
        ]);
        Zone::create([
            'city_id' => 6,
            'name' => 'Sucre',
        ]);
         Zone::create([
            'city_id' =>7 ,
            'name' => 'Valencia',
        ]);
         Zone::create([
            'city_id' =>7 ,
            'name' => 'Bejuma',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'Carlos Arvelo',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'Diego Ibarra',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'Guacara',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'Juan José Mora',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'Libertador',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'Los Guayos',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'Miranda',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'Montalbán',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'Naguanagua',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'Puerto Cabello',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'San Diego',
        ]);
        Zone::create([
            'city_id' =>7 ,
            'name' => 'San Joaquín',
        ]); 
         Zone::create([
            'city_id' =>8 ,
            'name' => 'Ezequiel Zamora',
        ]);
         Zone::create([
            'city_id' =>8 ,
            'name' => 'Anzoátegui',
        ]);
         Zone::create([
            'city_id' =>8 ,
            'name' => 'Girardot',
        ]);
         Zone::create([
            'city_id' =>8 ,
            'name' => 'Lima Blanco',
        ]);
         Zone::create([
            'city_id' =>8 ,
            'name' => 'Pao de San Juan Bautista',
        ]);
         Zone::create([
            'city_id' =>8 ,
            'name' => 'Ricaurte',
        ]);
         Zone::create([
            'city_id' =>8 ,
            'name' => 'Rómulo Gallegos',
        ]);
         Zone::create([
            'city_id' =>8 ,
            'name' => 'Tinaco',
        ]);
         Zone::create([
            'city_id' =>8 ,
            'name' => 'Tinaquillo',
        ]);
         Zone::create([
            'city_id' =>9 ,
            'name' => 'Tucupita',
        ]);
         Zone::create([
            'city_id' =>9 ,
            'name' => 'Antonio Díaz',
        ]);
         Zone::create([
            'city_id' =>9 ,
            'name' => 'Casacoima',
        ]);
         Zone::create([
            'city_id' =>9 ,
            'name' => 'Pedernales',
        ]);
         Zone::create([
            'city_id' =>10 ,
            'name' => 'Libertador de Caracas',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Miranda',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Acosta',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Bolívar',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Buchivacoa',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Cacique Manaure',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Carirubana',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Colina',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Dabajuro',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Democracia',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Falcón',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Federación',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Jacura',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Los Taques',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Mauroa',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Monseñor Iturriza',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Palma Sola',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Petit',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Píritu',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'San Francisco',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Silva',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Sucre',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Tocópero',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Unión',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Urumaco',
        ]);
         Zone::create([
            'city_id' =>11 ,
            'name' => 'Zamora',
        ]);
          Zone::create([
            'city_id' =>12 ,
            'name' => 'Juan Germán Roscio',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'Camaguán',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'Chaguaramas',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'El Socorro',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'Infante',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'Las Mercedes',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'Mellado',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'Miranda',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'Monagas',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'Ortiz',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'Ribas',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'San Gerónimo de Guayabal',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'San José de Guaribe',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'Santa María de Ipire',
        ]);
        Zone::create([
            'city_id' =>12 ,
            'name' => 'Zaraza',
        ]);
         Zone::create([
            'city_id' =>13 ,
            'name' => 'Iribarren',
        ]);
        Zone::create([
            'city_id' =>13 ,
            'name' => 'Andrés Eloy Blanco',
        ]);
        Zone::create([
            'city_id' =>13 ,
            'name' => 'Crespo',
        ]);
        Zone::create([
            'city_id' =>13 ,
            'name' => 'Jiménez',
        ]);
        Zone::create([
            'city_id' =>13 ,
            'name' => 'Morán',
        ]);
        Zone::create([
            'city_id' =>13 ,
            'name' => 'Palavecino',
        ]);
        Zone::create([
            'city_id' =>13 ,
            'name' => 'Simón Planas',
        ]);
        Zone::create([
            'city_id' =>13 ,
            'name' => 'Torres',
        ]);
        Zone::create([
            'city_id' =>13 ,
            'name' => 'Urdaneta',
        ]); 
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Libertador',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Alberto Adriani',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Andrés Bello',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Antonio Pinto Salinas',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Aricagua',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Arzobispo Chacón',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Campo Elías',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Caracciolo Parra Olmedo',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Cardenal Quintero',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Guaraque',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Julio César Salas',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Justo Briceño',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Miranda',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Obispo Ramos de Lora',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Padre Noguera',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Pueblo Llano',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Rangel',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Rivas Dávila',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Santos Marquina',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Sucre',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Tovar',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Tulio Febres Cordero',
        ]);
        Zone::create([
            'city_id' =>14 ,
            'name' => 'Zea',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Guaicaipuro',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Acevedo',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Andrés Bello',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Baruta',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Brión',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Buroz',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Carrizal',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Chacao',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Cristóbal Rojas',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'El Hatillo',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Independencia',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Los Salias',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Páez',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Paz Castillo',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Pedro Gual',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Plaza',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Simón Bolívar',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Sucre',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Tomás Lander',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Urdaneta',
        ]);
        Zone::create([
            'city_id' =>15 ,
            'name' => 'Zamora',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Maturín',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Acosta',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Aguasay',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Bolívar',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Caripe',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Cedeño',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Ezequiel Zamora',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Libertador',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Piar',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Punceres',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Santa Bárbara',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Sotillo',
        ]);
        Zone::create([
            'city_id' =>16 ,
            'name' => 'Uracoa',
        ]);
        Zone::create([
            'city_id' =>17 ,
            'name' => 'Arismendi',
        ]);
        Zone::create([
            'city_id' =>17 ,
            'name' => 'Antolín del Campo',
        ]);
        Zone::create([
            'city_id' =>17 ,
            'name' => 'Díaz',
        ]);
        Zone::create([
            'city_id' =>17 ,
            'name' => 'García',
        ]);
        Zone::create([
            'city_id' =>17 ,
            'name' => 'Gómez',
        ]);
        Zone::create([
            'city_id' =>17 ,
            'name' => 'Maneiro',
        ]);
        Zone::create([
            'city_id' =>17 ,
            'name' => 'Marcano',
        ]);
        Zone::create([
            'city_id' =>17 ,
            'name' => 'Mariño',
        ]);
        Zone::create([
            'city_id' =>17 ,
            'name' => 'Península de Macanao',
        ]);
        Zone::create([
            'city_id' =>17 ,
            'name' => 'Tubores',
        ]);
        Zone::create([
            'city_id' =>17 ,
            'name' => 'Villalba',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Guanare',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Agua Blanca',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Araure',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Esteller',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Guanarito',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Monseñor José Vicente de Unda',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Ospino',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Páez',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Papelón',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'San Genaro de Boconoíto',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'San Rafael de Onoto',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Santa Rosalía',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Sucre',
        ]);
        Zone::create([
            'city_id' =>18 ,
            'name' => 'Turén',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Sucre',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Andrés Eloy Blanco',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Andrés Mata',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Arismendi',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Benítez',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Bermúdez',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Bolívar',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Cajigal',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Cruz Salmerón Acosta',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Libertador',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Mariño',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Mejía',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Montes',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Ribero',
        ]);
        Zone::create([
            'city_id' =>19 ,
            'name' => 'Valdez',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'San Cristóbal',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Andrés Bello',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Antonio Rómulo Costa',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Ayacucho',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Bolívar',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Cárdenas',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Córdoba',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Fernández Feo',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Francisco de Miranda',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'García de Hevia',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Guásimos',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Independencia',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Jáuregui',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'José María Vargas',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Junín',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Libertad',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Libertador',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Lobatera',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Michelena',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Panamericano',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Pedro María de Ureña',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Rafael Urdaneta',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Samuel Darío Maldonado',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'San Judas Tadeo',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Seboruco',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Simón Rodríguez',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Sucre',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Torbes',
        ]);
        Zone::create([
            'city_id' =>20 ,
            'name' => 'Uribante',
        ]);
         Zone::create([
            'city_id' =>21 ,
            'name' => 'Trujillo',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Andrés Bello',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Boconó',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Bolívar',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Candelaria',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Carache',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Escuque',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'J. Felipe Márquez Cañizales',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Juan Vicente Campo Elías',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'La Ceiba',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Miranda',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Monte Carmelo',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Motatán',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Pampán',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Pampanito',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Rafael Rangel',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'San Rafael de Carvajal',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Sucre',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Urdaneta',
        ]);
        Zone::create([
            'city_id' =>21 ,
            'name' => 'Valera',
        ]);
        Zone::create([
            'city_id' =>22 ,
            'name' => 'Caraballeda',
        ]);
        Zone::create([
            'city_id' =>22 ,
            'name' => 'Carayaca',
        ]);
        Zone::create([
            'city_id' =>22 ,
            'name' => 'Carlos Soublette',
        ]);
        Zone::create([
            'city_id' =>22 ,
            'name' => 'Caruao',
        ]);
        Zone::create([
            'city_id' =>22 ,
            'name' => 'Catia La Mar',
        ]);
        Zone::create([
            'city_id' =>22 ,
            'name' => 'El Junko',
        ]);
        Zone::create([
            'city_id' =>22 ,
            'name' => 'La Guaira',
        ]);
        Zone::create([
            'city_id' =>22 ,
            'name' => 'Macuto',
        ]);
        Zone::create([
            'city_id' =>22 ,
            'name' => 'Maiquetía',
        ]);
        Zone::create([
            'city_id' =>22 ,
            'name' => 'Naiguatá',
        ]);
        Zone::create([
            'city_id' =>22 ,
            'name' => 'Urimare',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'San Felipe',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'Arístides Bastidas',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'Bolívar',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'Bruzual',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'Cocorote',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'Independencia',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'José Antonio Páez',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'La Trinidad',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'Manuel Monge',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'Nirgua',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'Peña',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'Sucre',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'Urachiche',
        ]);
         Zone::create([
            'city_id' =>23 ,
            'name' => 'Veroes',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Maracaibo',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Almirante Padilla',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Baralt',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Cabimas',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Catatumbo',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Colón',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Francisco Javier Pulgar',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Guajira',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Jesús María Semprún',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'La Cañada de Urdaneta',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Lagunillas',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Lossada',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Machiques de Perijá',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Mara',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Miranda',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Rosario de Perijá',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'San Francisco',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Santa Rita',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Simón Bolívar',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Sucre',
        ]);
         Zone::create([
            'city_id' =>24 ,
            'name' => 'Valmore Rodríguez',
        ]);

    }
}
