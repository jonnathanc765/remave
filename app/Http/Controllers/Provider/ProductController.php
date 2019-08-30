<?php

namespace App\Http\Controllers\Provider;

use App\Post;
use App\Category;
use App\Product;
use App\ProductImage;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('products.images')->whereShopId(Auth::user()->shop->id)->paginate(16);
        // dd($posts->first());
        return view('new_dashboard.provider.products.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('create', Post::class)) {
            $categories = Category::all();
            return view('new_dashboard.provider.products.create', ['categories' => $categories]);
        }else {
            return redirect()->back()->withError('No puede publicar productos hasta que no vincule su cuenta con Mercadopago, haz click en la opcion configuración de pago.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $post = Post::create([
            'description' => $request->postDescription,
            'published'   => $request->published == null ? '0' : '1',
            'shop_id'     => Auth::user()->shop->id
        ]);

        for ($i=0; $i < ($request->quantity); $i++) {
            $product = Product::create([
                'post_id'         => $post->id,
                'code'            => $this->generateProductCode(),
                'name'            => $request->input('productName'),
                'description'     => $request->input('productDescription'),
                'size'            => $request->input('ID_size_' . $i),
                'color'           => $request->input('ID_color_' . $i),
                'sub_category_id' => $request->input('sub_category_id'),
                'off'             => $request->input('ID_off_' . $i),
                'price'           => $request->input('ID_price_' . $i),
                'quantity'           => $request->input('product_quantity'),
            ]);

            $files = $request->file('ID_photo_' . $i);

            // Confirmando que se cargaron imagenes
            if ($files != null) {

                // Iteramos cada una de las imagenes
                foreach ($files as $file) {

                    $path = $file->store('public/products');
                    $path = str_replace('public/', '', $path);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'path'       => $path,
                    ]);

                }

            } elseif ($files == null && $product->images->count() == 0) {

                // Si hay productos sin imagenes se despublica el post
                $post->update([
                    'published'   =>  '0'
                ]);

            }
        }

        return back()->withSuccess("Cambios realizados exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('new_dashboard.provider.products.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        $user = Auth::user();
        $post = Post::with('products.images', 'products.subcategory')->findOrFail($postId);

        if ($user->can('edit', $post)){
            
            $categories = Category::with('subcategories')->get();
            
            $quantity = $post->products->count();
            
            return view('new_dashboard.provider.products.edit', compact('categories', 'post', 'quantity'));

        }else {

            abort(403);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, integer $postId)
    {
        $post = Post::findOrFail($postId);
        return back()->withSuccess('Publicacion creada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $request->validate([
            'id' => 'required'
        ]);

        $product = Product::find($data['id']);

        if ($product->post->products->count() == 1) {
            return 'Error';
        }

        $product->post->delete();

        return back()->withSuccess("Producto Eliminado de forma correcta");
    }

    /**
     * Ajax Query for subcategories in a determinate category
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subcategories(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->input('id'))->get();

        return ($subcategories);
    }

    /**
     * Genera un codigo unico para el producto
     *
     * @return string
     */
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

    /**
     * Verifica si el codigo es unico
     *
     * @return bolean
     */
    public function barcodeNumberExists($code)
    {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Product::whereCode($code)->exists();
    }

    public function updatePost(ProductFormRequest $request, $postId)
    {
        $user = Auth::user();
        $post = Post::with('products.images')->whereId($postId)->first();    

        if ($user->can('edit', $post)){

            $post->update([
                'description' => $request->postDescription,
                'published'   => $request->published == null? '0' : '1'
            ]);
            
            for ($i=0; $i < ($request->quantity); $i++) {
                
                $product = $post->products->where('code', $request->input("ID_code_" . $i))->first();
                
                $product->update([
                    'post_id'       =>  $post->id,
                    'name'          => $request->input('productName'),
                    'description'   => $request->input('productDescription'),
                    'stock'        => $request->input('product_stock'),
                    'size'          => $request->input('ID_size_' . $i),
                    'color'         => $request->input('ID_color_' . $i),
                    'sub_category_id' => $request->input('sub_category_id'),
                    'off'           => $request->input('ID_off_' . $i),
                    'price'         => $request->input('ID_price_' . $i),
                ]);
                
                $files = $request->file('ID_photo_' . $i);
                
                // Confirmando que se cargaron imagenes
                if ($files != null) {
                    // Iteramos cada una de las imagenes
                    foreach ($files as $file) {
                        $path  = $file->store('public/products');
                        $path = str_replace('public/', '', $path);
                        dd($path);
                        ProductImage::create([
                            'product_id' => $product->id,
                            'path'       => $path,
                        ]);  
                    }
                } elseif ($files == null && $product->images->count() == 0) {
                    
                    // Si hay productos sin imagenes se despublica el post
                    $post->update([
                        'published'   =>  '0'
                    ]);

                }
            }
            
            return back()->withSuccess("Cambios realizados exitosamente");

        }else {
            abort(403);
        }
    }

    public function new($postId)
    {
        $post = Post::find($postId);

        Product::create([
            'post_id'       => $post->id,
            'code'          => $this->generateProductCode(),
        ]);

        return back()->withSuccess('Producto Creado, Complete todos los campos para publicar el post');
    }
}
