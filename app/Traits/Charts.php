<?php

namespace App\Traits;

use App\Category;
use App\Charts\LastestRegistrationsChart;
use App\Charts\ProvidersWithMoreSales;
use App\Order;
use App\Post;
use App\Traits\MaterialColors;
use App\User;
use Carbon\Carbon;

/**
 * Trait encargado de generar los datos para las graficas
 */
trait Charts
{
    use MaterialColors;
    /**
     * Funcion para hacer todo el precedimiento
     * que se necesita para crear el grafico
     * de los registros en los ultimos 30 dias
     */
    public function lastestRegistrationsChart()
    {
        $totalUsers    = collect([]);
        $inactiveUsers = collect([]);
        $activeUsers   = collect([]);

        for ($diasAtras = 30; $diasAtras >= 0; $diasAtras--) {
            $totalUsers
                ->push(
                    User::whereDate(
                        'created_at',
                        today()->subDays($diasAtras)
                    )->count()
                );

            $activeUsers
                ->push(
                    User::whereDate(
                        'created_at',
                        today()->subDays($diasAtras)
                    )->where(
                        'email_verified_at',
                        '!=',
                        null
                    )->count()
                );

            $inactiveUsers
                ->push(
                    User::whereDate(
                        'created_at',
                        today()->subDays($diasAtras)
                    )->where(
                        'email_verified_at',
                        null
                    )->count()
                );
        }

        foreach ($totalUsers as $key => $value) {
            $labels[] = "Hace " . $key . " Dias";
        }

        $color  = '#36a2eb';
        $color2 = '#f27173';
        $color3 = '#008080';

        $chart1 = new LastestRegistrationsChart;
        $chart1->labels(array_reverse($labels));
        $chart1->dataset('Totales', 'bar', $totalUsers)->backgroundColor('#00174f');
        $chart1->dataset('Activos', 'bar', $activeUsers)->backgroundColor('#15a5dd');
        $chart1->options([
            'tooltips' => [
                'show'      => false,
                'mode'      => 'index',
                'intersect' => false,
            ],
        ]);
        return $chart1;
    }

    /**
     * Funcion para hacer todo el precedimiento
     * que se necesita para crear el grafico
     * de los productos por categoria
     */
    public function productsPerCategory()
    {
        $categories = Category::with('subcategories.products')->get();
        $data       = collect([]);

        foreach ($categories as $key1 => $category) {

            $productsPerSubCategory = collect([]);

            foreach ($category->subcategories as $key => $subcategory) {
                $productsPerSubCategory->push($subcategory->products->count());
            }

            $data->push([$category->name, $productsPerSubCategory->sum()]);
        }

        return $data;
    }

    public function providersWithMoreSales()
    {
        $all_posts = Post::with('orders')->whereMonth(
            'created_at',
            '>=',
            Carbon::now()->subMonth()->month
        )->get()->groupBy('shop_id');

        $providersWithMoreSales = collect([]);
        $labels                 = collect([]);
        $colors                 = collect([]);

        foreach ($all_posts as $key => $posts) {

            foreach ($posts as $key => $post) {
                if ($post->orders) {
                    $providersWithMoreSales->put($post->shop->user->name, $post->orders->count());
                    $colors->push($this->RandomColor());
                }
            }
        }

        $providersWithMoreSales = $providersWithMoreSales->filter(function ($numberOfSales) {
            return $numberOfSales > 0;
        });

        $providersWithMoreSales = $providersWithMoreSales->sort()->reverse();

        $providersWithMoreSales->splice(10);

        $chart3 = new ProvidersWithMoreSales;

        $chart3->labels($providersWithMoreSales->keys());

        $chart3->dataset('', 'horizontalBar', $providersWithMoreSales->values())->color($colors)->backgroundColor($colors);

        $chart3->options([
            'barPercentage'      => 0.1,
            'categoryPercentage' => 0.1,
            'barThickness'       => 2,
        ]);

        return $chart3;
    }

    public function revenueBy($date)
    {
        $ordersByDay = Order::with('orderDetails')->where(
            'created_at',
            '>=',
            $date
        )->where('status', 'successful')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d'); // grouping by days
                //return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $totals = collect([]);
        $total  = collect([]);

        foreach ($ordersByDay as $orders) {
            foreach ($orders as $order) {
                $total->push($order->orderDetails->pluck('total')->sum());
            }
            $totals->push($total->sum());
            $total = collect([]);
        }
        return $totals;
    }

    public function productsSell($date)
    {
        $ordersByDay = Order::with('orderDetails')->where(
            'created_at',
            '>=',
            $date
        )
            ->where('status', 'successful')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d'); // grouping by days
                //return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $products = collect([]);
        $product  = collect([]);

        foreach ($ordersByDay as $orders) {
            foreach ($orders as $order) {
                $product->push($order->orderDetails->pluck('quantity')->sum());
            }
            $products->push($product->sum());
            $product = collect([]);
        }
        return $products;
    }

    public function totalRevenue($date)
    {
        $ordersByQuarter = Order::with('orderDetails')->where(
            'created_at',
            '>=',
            $date
        )
            ->where('status', 'successful')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by month
                //return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });
        // dd($ordersByQuarter);
        $dataJson = collect([]);

        foreach ($ordersByQuarter as $orders) {
            $data         = collect([]);
            $totalQuarter = collect([]);
            foreach ($orders as $order) {
                $totalQuarter->push($order->orderDetails->pluck('total')->sum());
            }

            $data->put(
                'x',
                $orders->first()->created_at->format('Y-m')
            );
            $data->put('y', round($totalQuarter->sum(), 2));
            $dataJson->push($data);
        }
        // dd($dataJson);
        return $dataJson;
    }

    public function avgRevenuePerProvider()
    {
        $providers = User::whereHas('shop.posts', function ($post) {
            $post->whereHas('products', function ($product) {
                $product->whereHas('orderDetails', function ($orderDetail) {
                    $orderDetail->whereHas('order', function ($order) {
                        $order->where('status', 'successful')->withTrashed();
                    })->withTrashed();
                })->withTrashed();
            })->withTrashed();
        })->with(['shop.posts' => function ($post) {
            $post->whereHas('products', function ($product) {
                $product->whereHas('orderDetails', function ($orderDetail) {
                    $orderDetail->whereHas('order', function ($order) {
                        $order->where('status', 'successful')->withTrashed();
                    })->withTrashed();
                })->withTrashed();
            })->with(['products' => function ($product){
                $product->withTrashed()->with('orderDetails');
            }])->withTrashed();
        }])->role('provider')->get();
        // dd($providers);
        $avgPerProduct = collect([]);
        $avgPerPost    = collect([]);
        $avgPerUser    = collect([]);

        foreach ($providers as $key => $provider) {
            if (!is_null($provider->shop->posts)) {
                foreach ($provider->shop->posts as $key2 => $post) {
                    foreach ($post->products as $key3 => $product) {
                        $avgPerProduct->push($product->orderDetails->pluck('total')->avg());
                    }
                    $avgPerPost->push($avgPerProduct->avg());
                    $avgPerProduct = collect([]);
                };
            }
            $avgPerUser->push(round($avgPerPost->avg(), 2));
            $avgPerPost = collect([]);
        }
        return $avgPerUser;
    }

    public function productSales($date)
    {
        $ordersByQuarter = Order::with('orderDetails')->where(
            'created_at',
            '>=',
            $date
        )->get()->groupBy(function ($date) {
            return 'Q' . Carbon::parse($date->created_at)->quarter; // grouping by days
            //return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });

        $items = $ordersByQuarter->all();
        ksort($items);
        $ordersByQuarter = collect($items);

        $totalByQuarter           = collect([]);
        $totalByQuarter->quarters = [];
        $total                    = collect([]);

        foreach ($ordersByQuarter as $orders) {
            foreach ($orders as $order) {
                $total->push((int) $order->orderDetails->pluck('total')->sum());
            }

            $totalByQuarter->push($total->sum());
            array_push($totalByQuarter->quarters, 'Q' . $orders->first()->created_at->quarter);
            $total = collect([]);
        }
        return $totalByQuarter;
    }
}
