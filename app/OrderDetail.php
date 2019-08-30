<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'taxe', 'total'];

    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Product')->withTrashed();
    }

    public function productPrice()
    {
        return $this->total / $this->quantity;
    }
}
