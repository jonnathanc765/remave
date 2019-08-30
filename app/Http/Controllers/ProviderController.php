<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use App\Valuation;

class ProviderController extends Controller
{

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::role('provider')->get();
        return view('new_dashboard.admin.users.providers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::with('shop.posts.products.orderDetails.order.user')->whereId($user->id)->first();

        $valuations = Valuation::where('payee_id', $user->id)->with('user', 'payee', 'product')->paginate(10);

        $data = collect([]);
        $orderss = collect([]);
        
        $data->valuationAvg = round($valuations->pluck('rating')->avg(), 0);
        $data->valuationCount = $valuations->count();
        $data->soldProducts = 0;

        $data->registeredProduts = 0;

        $data->deletedProducts = 0;

        foreach ($user->shop->posts as $post) {
            foreach ($post->products as $product) {
                foreach ($product->orderDetails as  $orderDetail) {
                    // dd($orderDetail);
                    $orderss->push($orderDetail->order);
                }
            }
            $data->registeredProduts += $post->products->count();

            foreach ($post->products as $product) {
                $data->soldProducts += $product->orderDetails->pluck('quantity')->sum();
            }
        }

        $orders = $orderss->filter();

        return view('new_dashboard.admin.users.providers.show', compact('user', 'data', 'valuations', 'valuationAvg', 'orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    public function info()
    {
        return view('dashboard.provider.provider.info');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('providers')->withSuccess('Proveedor Eliminado ');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $users = User::search($request->name)->Role('provider')->get();
        return view('new_dashboard.admin.users.providers', compact('users'));
    }
}
