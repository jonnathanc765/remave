<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'shop_id', 'description', 'published'
    ];

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }

    public function scopeDescription($query, $description)
    {
        if ($description)
            return $query->where('description', 'LIKE', "%$description%");
    }

    public function scopeName($query, $name)
    {
        if ($name)
            return $query->where('name', 'LIKE', "%$name%");
    }
    public function averageValuation()
    {
        $avg = 0;
        $count = 0;
        $products = $this->products->load('valuations');
        foreach ($products as $product) {
            foreach ($product->valuations as $valuation) {
                $count++;
                $avg += $valuation->rating;
            }
        }
        if ($count == 0) {
            return 0;
        }

        return $avg/$count;

    }
    public function totalProducts()
    {
        return $this->products->count();
    }
}
