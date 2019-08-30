<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Socialite;

class SocialAuthController extends Controller
{
    /* Metodo encargado de la redireccion a facebook */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /* Metodo encargado de obtener la informacion del usuario */
    public function handleProviderCallback($provider)
    {
        /* Obtenemos los datos del usuario */
        $social_user = Socialite::driver($provider)->user();

        /* Comprobamos si el usuario ya existe */
        if ($user = User::where('email', $social_user->email)->first()) {

            if (!$user->avatar) {
                $user->update([
                    'avatar' => $social_user->avatar,
                ]);
            }

            return $this->authAndRedirect($user); //Login y Redireccion

        } else {
            /* En caso de que no exista creamos un nuevo usuario con sus datos */
            $user = User::create([
                'name'   => $social_user->name,
                'email'  => $social_user->email,
                'avatar' => $social_user->avatar,
            ]);
            event(new Registered($user));

            $user->assignRole('client');
            $user->givePermissionTo('registrar tienda');

            return $this->authAndRedirect($user); //Login y Redireccion
        }
    }

    /* Login y Redireccion */
    public function authAndRedirect($user)
    {
        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
