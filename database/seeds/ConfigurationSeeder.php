<?php

use Illuminate\Database\Seeder;
use App\Configuration;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::truncate();

        Configuration::create([
            'name' => 'app_id',
            'value' => '5324072234534048'
        ]);
        Configuration::create([
            'name' => 'secret_token',
            'value' => 'nvWYBVuVvmmvViWW4Zbe838o8xJaAfSp'
        ]);


        // Configuracion Meta SEO
        Configuration::create([
            'name' => 'meta-robots',
            'value' => 'index, follow'
        ]);
        Configuration::create([
            'name' => 'meta-author',
            'value' => 'Pedro Peréz'
        ]);
        Configuration::create([
            'name' => 'meta-subject',
            'value' => 'Ecommerce para la venta de repuestos'
        ]);
        Configuration::create([
            'name' => 'meta-keyword',
            'value' => 'palabres claves del sitio'
        ]);
        Configuration::create([
            'name' => 'meta-title',
            'value' => 'Ecommerce'
        ]);


        

        // Configuracion de redes sociales
        Configuration::create([
            'name' => 'Facebook',
            'value' => 'www.facebook.com'

        ]);
            Configuration::create([
            'name' => 'Instagram',
            'value' => 'www.instagram.com'
        ]);
            Configuration::create([
            'name' => 'Google+',
            'value' => 'www.google.co.ve'
    ]);

            Configuration::create([
            'name' => 'LinkedIn',
            'value' => 'www.linkedIn.com'
        ]);
             Configuration::create([
            'name' => 'Twitter',
            'value' => 'www.twitter.com'
        ]);
    
          Configuration::create([
            'name' => 'Pinterest',
            'value' => 'www.pinterest.com'
        ]);

          Configuration::create([
            'name' => 'Telefono',
            'value' => '04163559590'
        ]);

          Configuration::create([
            'name' => 'Email',
            'value' => 'Remaveshopss@gmail.com'
        ]);

          Configuration::create([
            'name' => 'Direccion',
            'value' => 'Barquisimeto, Lara'
        ]);

        // Configuracion de Banners
        Configuration::create([
            'name' => 'centralHighBannerHigh',
            'value' => '6'
        ]);
        Configuration::create([
            'name' => 'centralLowBannerLimit',
            'value' => '4'
        ]);
        Configuration::create([
            'name' => 'principalBannerLimit',
            'value' => '4'
        ]);
        Configuration::create([
            'name' => 'categoryBannerLimit',
            'value' => '4'
        ]);
        Configuration::create([
            'name' => 'featuredStores',
            'value' => '6'
        ]);
        
        
        


        // Configuracion de Comisiones y Pagos
        Configuration::create([
            'name' => 'comision',
            'value' => '0.5'
        ]);

        // Letrero de informacion para el homepage
        Configuration::create([
            'name' => 'information',
            'value' => 'Actualmente estamos trabajando en todas nuestras tiendas en Barqisimeto estado Lara '
        ]);

        // Letrero de informacion para el homepage
        Configuration::create([
            'name' => 'mission',
            'value' => 'REMAVECA, es una empresa familiar, establecida en Barquisimeto, estado Lara hace unos 12 años. Se inició como un detal especializado en repuestos automotrices, hasta llegar a ser una red de tiendas minoristas en el occidente del país y ventas al mayor a todo el territorio nacional. Con un portafolio de más de 3.000 ítems, de los cuales, aproximadamente el 95%, son importados por la empresa. Esto nos permite ofrecer excelentes condiciones a todos nuestros clientes'
        ]);
        
        
    }

}
