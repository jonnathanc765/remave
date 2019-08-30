<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Traits\Charts;
use App\User;
use Carbon\Carbon;
use App\Shop;

class AdministratorController extends Controller
{
    use Charts;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard
     * with Charts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastMonthRevenue = $this->revenueBy(Carbon::now()->subMonth(1)->format('Y-m-d'));

        $lastYearRevenue = $this->revenueBy(Carbon::now()->subMonth(12)->format('Y-m-d'));

        $sellProductsInLastMonth = $this->productsSell(Carbon::now()->subMonth(1)->format('Y-m-d'));

        $avgRevenuePerProvider = $this->avgRevenuePerProvider();

        $orders = Order::with('user', 'orderDetails.product.post.shop.user')->orderBy('updated_at', 'desc')->take(8)->get();

        $productsPerCategory = $this->productsPerCategory();

        $productSales = $this->productSales(Carbon::now()->subMonth(12)->format('Y-m-d'));

        $totalOrders = Order::count();

        $totalRevenue = $this->revenueBy(Carbon::now()->subYear(12)->format('Y-m-d'));

        $newCustomers = User::whereMonth('created_at', '>=', Carbon::now()->subMonth(1))->role('client')->count();

        $newShops = Shop::whereMonth('created_at', '>=', Carbon::now()->subMonth(1))->count();

        $totalRevenueGrapth = $this->totalRevenue(Carbon::now()->subYear(12)->format('Y-m-d'));

        $mostPointUser = User::orderBy('point', 'DESC')->take(12)->get();

        $clientsOrders = Order::with('user')->groupBy('user_id')
            ->selectRaw('count(*) as total, user_id')
            ->orderBy('total', 'DESC')
            ->take(12)
            ->get();

        $bestSeller = OrderDetail::with('product.post.shop.user')->groupBy('product_id')
            ->selectRaw('count(*) as total, product_id')
            ->orderBy('total', 'DESC')
            ->get();

        $seller = collect([]);

        foreach ($bestSeller as $item) {
            $seller->push($item->product->post->shop);
        }

        $bestSeller = collect([]);

        foreach ($seller->groupBy('id') as $se) {
            $bestSeller->push($se->first());
        }


        $bestSeller->take(12);

        return view('new_dashboard.admin.index')->with(compact('bestSeller', 'mostPointUser', 'clientsOrders', 'lastMonthRevenue', 'lastYearRevenue', 'orders', 'sellProductsInLastMonth', 'productsPerCategory', 'totalOrders', 'totalRevenue', 'newCustomers', 'totalRevenueGrapth', 'avgRevenuePerProvider', 'productSales', 'newShops'));
    }
}
