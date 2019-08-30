<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;

class ReportController extends Controller
{
    public function index()
    {
        $users    = User::all();
        $products = Product::with('subcategory')->get();
        $orders   = Order::with('user')->get();

        return view('dashboard.reports.index')->with(compact(['users', 'products', 'orders']));
    }
}
