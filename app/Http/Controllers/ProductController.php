<?php

namespace App\Http\Controllers;

use App\Category;
use App\DetailProduct;
use App\ProductImage;
use App\Post;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource('product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::with('subcategory')->get();

        return view('new_dashboard.admin.products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Category::where('deleted_at', null)->get();
        foreach ($categoria as $category) {

            if ($category->subCategories->count() != 0) {
                $categories[] = $category;
            }

        }

        return view('dashboard.posts.create', compact('categories'));
    }

    public function subcategories(Request $request)
    {
        $id            = $request->input('id');
        $subcategories = SubCategory::where('category_id', $id)->get();

        return ($subcategories);
    }

    public function newStore(Request $request)
    {
        $post = Post::create([
            'user_id'     => Auth::user()->id,
            'product_id'  => $product->id,
            'description' => $request->postDescription,
            'quantity'       => $request->product_quantity,
            'published'   => true,
        ]);
        $post->save();
 
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(ProductFormRequest $request)
    {
        
    }

    public function generateProductCode()
    {
        $code = ucwords(str_random(12));

        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($code)) {
            return generateProductCode();
        }

        // otherwise, it's valid and can be used
        return $code;
    }

    public function barcodeNumberExists($code)
    {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Product::whereCode($code)->exists();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.posts.ver', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        $post            = Post::with('product.subCategory.category')->find($postId);
        $postCategory    = $post->product->subcategory->category;
        $postSubCategory = $post->product->subcategory;
        //dd($post->product->detailsProduct);
        $categoria = Category::where('deleted_at', null)->get();
        foreach ($categoria as $category) {

            if ($category->subCategories->count() != 0) {
                $categories[] = $category;
            }

        }
        return view('dashboard.posts.edit', ['post' => $post, 'categories' => $categories, 'postCategory' => $postCategory, 'postSubCategory' => $postSubCategory]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        $post = Post::find($id);

        $post->update([
            'description' => $request->postDescription,
            'quantity'       => $request->product_quantity,
            'published'   => true,
        ]);

        $product = Product::find($post->product->id);

        $product->update([
            'name'            => $request->name,
            'sub_category_id' => $request->sub_category_id,
            'description'     => $request->description,
            'quantity'           => $request->quantity,
        ]);

        //Actualizacion de los detalles
        if (isset($request->numDetails)) {
            for ($i = 0; $i < $request->numDetails; $i++) {
                $number = $i;
                $number += 1;
                if ($number > count($product->detailsProduct)) {
                    $detailProduct             = new DetailProduct;
                    $detailProduct->product_id = $product->id;
                    $detailProduct->quantity   = $request->input('ID_' . $i . '_quantity');
                    $detailProduct->price      = $request->input('ID_' . $i . '_price');
                    $detailProduct->color      = $request->input('ID_' . $i . '_color');
                    $detailProduct->size       = $request->input('ID_' . $i . '_size');
                    $detailProduct->save();
                } else {
                    $detailProduct = $product->detailsProduct[$i];
                    $detailProduct->quantity = $request->input('ID_' . $number . '_quantity');
                    $detailProduct->price    = $request->input('ID_' . $number . '_price');
                    $detailProduct->color    = $request->input('ID_' . $number . '_color');
                    $detailProduct->size     = $request->input('ID_' . $number . '_size');
                    $detailProduct->save();
    
                    $detailProduct->images()->delete();
                    $files = $request->file('ID_' . $number . '_photo');
                    foreach ($files as $file) {
                        $path  = $file->store('/products');
                        $image = new ProductImage([
                            'photo'             => $path,
                            'detail_product_id' => $detailProduct->id,
                        ]);
                        $detailProduct->images()->save($image);
                    }
                }
            }

        } else {

            $detailProduct           = $product->detailsProduct;
            $detailProduct->quantity = $request->input('ID_1_quantity');
            $detailProduct->price    = $request->input('ID_1_price');
            $detailProduct->color    = $request->input('ID_1_color');
            $detailProduct->size     = $request->input('ID_1_size');
            $detailProduct->save();

            $path                     = $request->file('ID_1_photo')->store('/products');
            $image                    = new ProductImage;
            $image->detail_product_id = $detailProduct->id;
            $image->photo             = $path;
            $image->save();

        }

        return back()->withSuccess('Publicacion actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Post::find($id);
        $products->delete();

        return redirect()->back()->withSuccess('Producto eliminado');
    }

    //Metodos para los proveedores
    public function indexProvider()
    {
        $posts = Post::with('product.images')->where('user_id', Auth::user()->id)->get();
        return view('dashboard.posts.index', compact('posts'));
    }

}
