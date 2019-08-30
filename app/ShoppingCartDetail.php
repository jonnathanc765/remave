<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetail extends Model
{
    protected $fillable = ['shopping_cart_id', 'product_id', 'quantity', 'price'];
}
