<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['category_id', 'name', 'description'];

    protected $dates = ['deleted_at'];
    
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function totalProducts()
    {
        return $this->products->count();
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
