<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'state_id',
        'city_id',
        'zone_id',
        'zip_code',
        'street',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }
    
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }
}
