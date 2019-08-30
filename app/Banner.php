<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = ['shop_id', 'name', 'path', 'position'];

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
