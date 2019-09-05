<?php

namespace App\Http\Requests;


use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;


class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        
        $quantity = $request->quantity;

        $data = array();


        $data['productName']            = 'required';
        $data['productDescription']     = 'required';
        $data['postDescription'] = 'required';
        $data['sub_category_id'] = 'required';

        for ($i=0; $i < ($request->quantity); $i++) {

            $data['ID_color_' . $i]      = 'required';
           // $data['ID_size_' . $i]       = 'required';
            $data['ID_price_' . $i]      = 'required';
            $data['ID_photo_' . $i]      = '';
        }     


        return $data;
    }

    public function attributes()
    {

        $quantity = request('quantity');

        $data = array();
        

        $data['productName']            = 'Nombre del producto';
        $data['productDescription']     = 'Descripcion del producto';
        $data['postDescription'] = 'Descripcion del Post';
        $data['sub_category_id'] = 'SubCategoría';

        for ($i=0; $i < ($quantity); $i++) {

            $data['ID_color_' . $i]      = 'Color del producto N° ' . ($i + 1);
            $data['ID_size_' . $i]       = 'Tamaño del producto N° ' . ($i + 1);
            $data['ID_price_' . $i]      = 'Precio del producto N° ' . ($i + 1);
            $data['ID_photo_' . $i]      = 'Imagen del producto N° ' . ($i + 1);
        }     

        return $data;
    }
}
