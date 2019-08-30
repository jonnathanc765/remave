<?php

namespace App\Http\Controllers;

use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Consulta ajax para eliminar las imagenes
     * de producto en cuestion, la consulta de dicha funcion
     * es utilizada por axios en el cliente
     * @param integer $imageId
     * @return json
     */
    public function destroyImages(Request $request)
    {
        $data = $request->validate([
            'id' => 'required'
        ]);


        $image = ProductImage::find($data['id']);

        $product = $image->product;

        $image->delete();

        
        if ($product->images->count() == 0) {
            $product->post->published = 0;
            $product->post->save();
            return back()->withSuccess("El post ha dejado de ser publicado por falta de imagen en un de los productos");
        }

        return back()->withSuccess('Imagen borrada exitosamente');
    }
}
