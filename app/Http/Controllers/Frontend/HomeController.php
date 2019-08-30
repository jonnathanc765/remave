<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use QCod\Gamify\Badge;
use App\Configuration;
use App\SubCategory;
use App\Category;
use App\Product;
use App\Banner;
use App\Post;
use App\Shop;
use App\Faq;

class HomeController extends Controller
{

    public function index()
    {
        $lastestProducts = Product::with('images', 'subcategory')->get()->reverse()->take(8);

        $bestSellers = $this->bestSellers();

        $banners     = Banner::where('position', '!=', 0)->orderBy('position', 'asc')->get();

        $centralHighBanner = Banner::where('position', 3)->orderBy('position', 'asc')->first();

        $centralLowBanner = Banner::where('position', 4)->orderBy('position', 'asc')->first();

        $featuredStores = Banner::where('position', 5)->orderBy('position', 'asc')->get();

        $information = Configuration::where('name','information')->first();

        $data = collect([]);

        $data['information'] = $information;

        $data['centralHighBanner'] = $centralHighBanner;

        $data['centralLowBanner'] = $centralLowBanner;
        
        $data['featuredStores'] = $featuredStores;


        $categories  = Category::where('published', '!=', 0)->with('subcategories')->take(6)->get();

        return view('frontend.home', compact('banners', 'categories', 'data', 'default', 'lastestProducts', 'bestSellers'));
    }

    public function showContact()
    {
        return view('frontend.contact');
    }

    public function searchPosts(Request $request)
    {
        $query    = $request->s;
        $products = Product::with('post')
            ->search($query)
            ->paginate(8);

        return view('frontend.search')->with(compact('products', 'query'));
    }

    public function bestSellers()
    {
        $products = Product::withCount('orderDetails')
            ->with('images', 'subcategory')
            ->orderBy('order_details_count', 'desc')
            ->take(12)
            ->get();
        return $products;
    }

    public function shop(Shop $shop)
    {
        $data = collect([]);

        $products = collect([]);

        //Comentado por falta de tiempo
        // dd( $products = Product::withCount('orderDetails')->take(12)->first()->orderDetails_count);

        
        $user = $shop->user;
        $user->load('shop.posts.products.images', 'shop.posts.products.subcategory');
        $badges = Badge::orderBy('level')->get();
        foreach ($user->shop->posts as $post) {
            foreach ($post->products as $product) {
                $products->push($product);
            }
        }
        $data->products = $products;

        

        $posts = $user->shop->posts;

        $top = $products->shuffle()->take(4);
        
        $data->top = $top;

        
                

        return view('frontend.shop',compact('shop', 'data', 'badges'));
    }

    public function faqs()
    {
        $faqs = Faq::all();

        return view('frontend.faqs',compact('faqs'));
    }
    public function howAdd()
    {
        return view('frontend.how-add');
    }
    public function howBuy()
    {
        return view('frontend.how-buy');
    }
    public function shipping()
    {
        return view('frontend.shipping');
    }
    public function terms()
    {
        return view('frontend.terms');
    }
    public function forbidden()
    {
        $file = public_path() . "/documents/forbidden.pdf";

        $headers = array(
            'Content-Type: application/pdf'
        );

        return response()->download($file, 'Articulos-Prohibidos.pdf', $headers);
    }
}

