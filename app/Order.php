<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TimeStampsInSpanish;
use App\Gamify\Points\PostSold;
use App\Events\OrderPaid;
use App\Events\OrderShipped;

class Order extends Model
{
    use SoftDeletes, TimeStampsInSpanish;

    protected $fillable = ['user_id', 'post_id', 'code', 'payment_type', 'state_id', 'city_id', 'zone_id', 'zip_code', 'street', 'address', 'bank_reference', 'name_bank'];

    protected $dates = ['deleted_at'];

    protected $appends = ['total', 'total_products'];

  //  public function getPaymentTypeAttribute($value)
    //{
      //  return $value == 'MERCADOPAGO' ? $value = 'Mercadopago' : $value = 'Acordar con el vendedor';
   // }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withTrashed();
    }

    public function scopeSearch($query, $name)
    {
        return $query->where('user_id', 'LIKE', "%$name%")
            ->orWhere('code', 'LIKE', "%$name%")
            ->orWhere('created_at', 'LIKE', "%$name%");
    }

    public function getTotalAttribute()
    {
        return round($this->orderDetails()->pluck('total')->sum(), 2);
    }
    
    public function getTotalProductsAttribute()
    {
        return $this->orderDetails()->pluck('quantity')->sum();
    }

    public function getProviderAttribute()
    {
        return $this->orderDetails->first()->product->post->shop->user;
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

    /**
     * Give reputation and points
     * to the involucrated users
     * 
     * @param Order $order
     * @return void
     */
    public function givePoints()
    {
        $post = $this->orderDetails->first()->product->post;
        $user = $this->user;
        foreach ($this->orderDetails as $orderDetail) {
            /**
             * Por cada producto dentro de la orden
             * se le da 1 punto al proveedor para calcular su
             * reputacion dentro del sitio
             */
            givePoint(new PostSold($post));
        }

        /**
         * Se le suma la cantidad total vendida por cada producto
         * a los puntos del cliente
         */
        $user->increment('point', round($this->total, 0));

        return true;
    }

    /**
     * Marl the current order has successfull
     * 
     * @return boolean
     */
    public function markAsSuccess()
    {
        $this->status = 'successful';
        if ($this->save()) {
            return true;
        }

        return false;
    }

    public function shipping()
    {
        $this->shipped = true;
        if ($this->save()) {
            event(new OrderShipped($this));
            return true;
        }
        return false;
    }
}
