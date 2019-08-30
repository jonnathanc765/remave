<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valuation extends Model
{
    protected $fillable = [
        'user_id',
        'payee_id',
        'product_id',
        'comment',
        'rating'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payee()
    {
        return $this->belongsTo('App\User', 'payee_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
