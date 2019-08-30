<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonie extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'provider_id', 'testimonie'];

    protected $dates = ['deleted_at'];

    public function provider()
    {
        return $this->belongsTo('App\User','provider_id');
    }
    public function client()
    {
        return $this->belongsTo('App\User','user_id');
    }

     public function scopeSearch($query, $name)
    {
        return $query->where('user_id', 'LIKE', "%$name%")
                    ->orWhere('provider_id', 'LIKE', "%$name%")
                    ->orWhere('testimonie', 'LIKE', "%$name%");
    }

}
