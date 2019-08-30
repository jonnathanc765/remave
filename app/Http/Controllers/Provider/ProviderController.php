<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ProviderCharts;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Order;

class ProviderController extends Controller
{
    use ProviderCharts;

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastMonthRevenue = $this->revenueBy(Carbon::now()->subMonth(1)->format('Y-m-d'));

        $lastYearRevenue = $this->revenueBy(Carbon::now()->subMonth(12)->format('Y-m-d'), 'm');
 
        $sellProductsInLastMonth = $this->productsSell(Carbon::now()->subMonth(1)->format('Y-m-d'));

        $avg = $this->avgRevenue();


        $orders = Order::whereHas('orderDetails.product.post.shop.user', function ($query){
            $query->where('user_id', Auth::id());
        })->take(12)->get();

        $products = Auth::user()->shop->products;
/* 
        foreach ($products as $product) {
            
        } */

        return view('new_dashboard.provider.index', compact('lastMonthRevenue', 'lastYearRevenue', 'sellProductsInLastMonth', 'avg', 'orders'));
    }
}
