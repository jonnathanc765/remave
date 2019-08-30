<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $data = collect([]);

        $data->equalSize = true;

        $data->equalColor = true;

        $product = Product::with('post.shop.user', 'images', 'post.shop.banner', 'post.comments.user', 'valuations.user')->whereCode($code)->firstOrFail();

        $productColors = Product::distinct('color')->where('post_id', $product->post->id)->groupBy('color')->with('images', 'valuations')->get();

        $data['productColors'] = $productColors;

        if ($productColors->count() > 1) {
            $data->equalColor = false;
        }

        $productSizes = Product::distinct('size')->where('post_id', $product->post_id)->where('color', $product->color)->with('images', 'valuations')->get();

        if ($productSizes->count() > 1) {
            $data->sizes     = $productSizes;
            $data->equalSize = false;
        }

        $relatedProducts = $product->related->chunk(3);

        return view('frontend.single-product', compact('product', 'data', 'relatedProducts'));
    }
}
