<?php

namespace App\Console;

use App\Shop;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Configuration;

// use Http\Controllers\MercadoPagoController;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $date = Carbon::now()->subMonth(5);
        $schedule->call(function () use ($date) {
            $shops = Shop::whereDate('refreshed_at', '<=', $date)->get();

            foreach ($shops as $shop) {
                $this->renewToken($shop);
            }

        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
    
    public function renewToken(Shop $shop)
    {
        $client_id     = Configuration::where('name', 'app_id')->first()->value;
        $client_secret = Configuration::where('name', 'secret_token')->first()->value;
        $refresh_token = $shop->refresh_token;

        if ($refresh_token) {
            $data = [
                'client_id'     => $client_id,
                'client_secret' => $client_secret,
                'grant_type'    => 'refresh_token',
                'refresh_token' => $refresh_token,
            ];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL            => "https://api.mercadopago.com/oauth/token",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 30000,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => "POST",
                CURLOPT_POSTFIELDS     => json_encode($data),
                CURLOPT_HTTPHEADER     => array(
                    // Set here requred headers
                    "accept: application/json",
                    "content-type: application/x-www-form-urlencoded",
                ),
            ));

            $response = curl_exec($curl);
            $err      = curl_error($curl);
            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $response            = json_decode($response);
                $shop->access_token  = $response->access_token;
                $shop->public_key    = $response->public_key;
                $shop->refresh_token = $response->refresh_token;
                $shop->refreshed_at  = Carbon::now();
                $shop->save();
                return true;
            }
        }
        return false;
    }
}
