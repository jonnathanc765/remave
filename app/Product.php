<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\SubCategory;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['sub_category_id', 'post_id', 'code', 'name', 'description', 'size', 'size_type', 'color', 'price','quantity', 'off'];

    protected $dates = ['deleted_at'];

    public function getOwnerAttribute()
    {
        return $this->post->shop->user;
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%")
                    ->orWhere('description', 'LIKE', "%$name%")
                    ->orWhere('code', 'LIKE', "%$name%")
                    ->orWhere('sub_category_id', 'LIKE', "%$name%");
    }

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function post()
    {
        return $this->belongsTo('App\Post')->withTrashed();
    }
    
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
    
    public function valuations()
    {
        return $this->hasMany('App\Valuation');
    }

    public function price()
    {
        if ($this->off > 0) {
            return $this->price * ((100 - $this->off) / 100 );
        }
        return $this->price;
    }
    
    public function getRelatedAttribute()
    {
        $related = $this->subcategory->products->shuffle()->take(12);
        if ($related->count() <= 12) {
            $productsInCategory = $this->getRelatedByCategoryAttribute()->take($related->count() - 12);
            $productsInCategory->map(function ($product) use ($related) {
                $related->push($product);
            });
        }

        return $related->load('images');
    }
    
    public function getRelatedByCategoryAttribute()
    {
        return $this->subcategory->category->products->shuffle();
    }
}
