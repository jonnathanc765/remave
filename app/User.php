<?php

namespace App;

use App\Traits\TimeStampsInSpanish;
use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use QCod\Gamify\Gamify;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\CustomResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, TimeStampsInSpanish, HasRoles, Messagable, SoftDeletes, Gamify;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'dni', 'name', 'email', 'password', 'avatar', 'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\Email\CustomVerifyEmail);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%")
            ->orWhere('email', 'LIKE', "%$name%")
            ->orWhere('dni', 'LIKE', "%$name%");
    }

    public function shop()
    {
        return $this->hasOne('App\Shop');
    }

    public function hasShop($userId)
    {
        return $this->shop()->where('user_id', $userId)->count() > 0;
    }

    public function testimonies()
    {
        return $this->hasMany('App\Testimonie', 'provider_id');
    }

    public function responseAvg()
    {
        return ($this->evaluations->avg('response_time') + $this->evaluations->avg('quality_product')) / 2;
    }
    public function providerValuations()
    {
        return $this->hasMany('App\Valuation', 'payee_id')->with('user');
    }

    public function userDetail()
    {
        return $this->hasOne('App\UserDetail')->withDefault();
    }
}
