<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $dates    = ['deleted_at'];
    protected $fillable = [
        'name', 'description', 'image',
    ];

    public function subCategories()
    {
        return $this->hasMany('App\SubCategory');
    }

    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\SubCategory');
    }

    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%")
                    ->orWhere('description', 'LIKE', "%$name%");
    }
}
