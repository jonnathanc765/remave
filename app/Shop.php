<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'logo',
        'minimum_ammount',
        'zone_id',
        'address',
        'phone',
        'access_token',
        'public_key',
        'pay_user_id',
        'refresh_token'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function banner()
    {
        return $this->hasOne('App\Banner');
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function verified()
    {
        return $this->access_token && $this->public_key && $this->pay_user_id && $this->refresh_token;
    }

    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\Post')->with('orderDetails.order');
    }
}
