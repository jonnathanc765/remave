<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['product_id', 'path'];

    protected $dates = ['deleted_at'];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function sibblings()
    {
        return $this->product->images;
    }
}
