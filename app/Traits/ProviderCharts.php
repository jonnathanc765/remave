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
use Illuminate\Support\Facades\Auth;

/**
 * Trait encargado de generar los datos para las graficas
 */
trait ProviderCharts
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

    public function revenueBy($date, string $groupBy = 'd')
    {
        $products = User::whereId(Auth::id())->with('shop.posts.products.orderDetails.order')->first()->shop->products;
        $orders   = collect([]);

        foreach ($products as $product) {
            foreach ($product->orderDetails as $orderDetail) {
                if ($orderDetail->order) {
                    if ($orderDetail->order->updated_at >= $date && $orderDetail->order->status == 'successful') {
                        $orders->push($orderDetail->order);
                    }
                }
            }
        }
        $orderPerGroupBy = $orders->unique('id')->groupBy(function ($date) use ($groupBy) {
            return Carbon::parse($date->updated_at)->format($groupBy);
        })->sortKeys();
        $total = collect([]);

        foreach ($orderPerGroupBy as $orders) {
            $totalPerGroupBy = collect([]);
            foreach ($orders as $order) {
                $totalPerGroupBy->push($order->orderDetails->pluck('total')->sum());
            }
            $total->push($totalPerGroupBy->sum());
        }
        return $total;
    }

    public function productsSell($date, string $groupBy = 'd')
    {
        $products     = User::whereId(Auth::id())->with('shop.posts.products.orderDetails.order')->first()->shop->products;
        $orderDetails = collect([]);

        foreach ($products as $product) {
            foreach ($product->orderDetails as $orderDetail) {
                if ($orderDetail->order) {
                    if ($orderDetail->order->updated_at >= $date && $orderDetail->order->status == 'successful') {
                        $orderDetails->push($orderDetail);
                    }
                }
            }
        }
        $orderDetailsPerGroupBy = $orderDetails->unique('id')->groupBy(function ($date) use ($groupBy) {
            return Carbon::parse($date->updated_at)->format($groupBy);
        })->sortKeys();
        $total = collect([]);

        foreach ($orderDetailsPerGroupBy as $orderDetails) {
            $total->push($orderDetails->pluck('quantity')->sum());
        }
        return $total;
    }

    public function totalRevenue($date)
    {
        $ordersByQuarter = Order::with('orderDetails')->where(
            'created_at',
            '>=',
            $date
        )
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
 
    public function avgRevenue()
    {
        $orders = Order::whereHas('orderDetails', function ($query){
            $query->whereHas('product', function ($query){
                $query->whereHas('post', function ($query){
                    $query->whereHas('shop', function ($query){
                        $query->whereHas('user', function ($query){
                            $query->whereId(Auth::id());
                        });
                    });
                });
            });
        })->whereStatus('successful')->get();

        $avgPerProduct = collect([]);
        foreach ($orders as $order) {
            $avgPerProduct->push(round($order->orderDetails->pluck('total')->sum()));
        }

        return $avgPerProduct;
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
