<?php

namespace App\Http\Controllers;

use App\City;
use App\Configuration;
use App\Http\Requests\UserDetailRequest;
use App\State;
use App\User;
use App\UserDetail;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConfigurationController extends Controller
{
    public function index()
    {
        $data            = [];
        $configuraciones = Configuration::all();
        foreach ($configuraciones as $config) {
            $data = array_merge($data, array($config->name => $config->value));
        }
        $user   = User::with('userDetail')->where('id', Auth::id())->first();
        $states = State::all();
        $cities = City::all();
        $zones  = Zone::all();

        return view('new_dashboard.admin.configuration.index', compact('data', 'user', 'states', 'cities', 'zones'));
    }

    public function storeSEO(Request $request)
    {
        $data = $request->validate([
            'meta-title'   => '',
            'meta-subject' => '',
            'meta-author'  => '',
            'meta-robots'  => '',
        ]);

        if (isset($data['meta-robots']) == false) {
            $data['meta-robots'] = 'noindex';
        }

        foreach ($data as $key => $d) {
            if ($d != null) {
                $configuracion = Configuration::where('name', $key)->update(['value' => $d]);
            }
        }

        return redirect()->route('configuration.index')->withSuccess('Los cambios fueron guardados');

    }

    public function ver()
    {

        $comision = Configuration::where('name', 'comision')->first()->value;
        $app_id   = Configuration::where('name', 'app_id')->first()->value;

        return view('new_dashboard.admin.payment.index', compact('comision', 'app_id'));

    }

    public function store(Request $request)
    {

        $config = Configuration::where('name', 'Comision')->first();
        $data   = $request->validate([
            'value' => 'numeric|integer|min:0|max:99'
        ]);

        $data['value'] /= 10;

        $config->update($data);

        return redirect()->route('payments')->withSuccess("Comision ajustada exitosamente al " .$data['value']*10 ."%");

    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name'   => 'required',
            'dni'    => 'integer|required',
            'email'  => 'email|required|unique:users,email,' . $user->id,
            'avatar' => 'image',
        ]);
        $user->name = $request->name;
        $user->dni  = $request->dni;

        $avatar = $request->file('avatar');
        if (!is_null($avatar)) {
            $user->avatar = $avatar->store('public/avatars');
        }

        if ($user->email != $request->email) {
            $user->email             = $request->email;
            $user->email_verified_at = null;
        }

        $user->save();
        return redirect()->route('configuration.index')->withSuccess('Actualizacion Exitosa');
    }

    public function updateDetails(UserDetailRequest $request)
    {
        $user = Auth::user();
        $data = $request->merge(['user_id' => Auth::id()])->all();
        unset($data['_token']);
        UserDetail::updateOrCreate($user->userDetail->toArray(), $data);

        return redirect()->route('configuration.index')->withSuccess('Actualizacion Exitosa');
    }

    public function updateUserPassword(Request $request)
    {
        $user = Auth::user();
        if (!Hash::check($request->acpassword, $user->password)) {
            return back()->withError('Error en la contraseña actual');
        }
        if ($request->password != $request->cfmPassword) {
            return back()->withError('La nueva contraseña no es igual a la confirmación');
        }
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return redirect()->route('configuration.index')->withSuccess('Actualización realizada con exito');
        } else {
            return back()->withError('Error en la actualización');
        }

    }

    public function indexSocial()
    {
        $social = Configuration::all('name');
        return view('dashboard.configuration.index', compact('social'));
    }

    public function storeSocial(Request $request)
    {
        $data = $request->validate([
            'Facebook'  => '',
            'Instagram' => '',
            'Google+'   => '',
            'LinkedIn'  => '',
            'Twitter'   => '',
            'Pinterest' => '',
        ]);
        foreach ($data as $key => $d) {
            if ($d != null) {
                $configuracion = Configuration::where('name', $key)->update(['value' => $d]);
            }
        }
        return redirect()->route('configuration.index')->withSuccess('Actualizacion Exitosa');
    }

    public function storeContac(Request $request)
    {
        $data = $request->validate([
            'Telefono'  => '',
            'Email'     => '',
            'Direccion' => '',
        ]);
        foreach ($data as $key => $d) {
            if ($d != null) {
                $configuracion = Configuration::where('name', $key)->update(['value' => $d]);
            }
        }
        return redirect()->route('configuration.index')->withSuccess('Actualizacion Exitosa');
    }

    public function saveToken(Request $request)
    {
        $data = $request->validate([
            'secret_token' => 'required',
            'app_id'       => 'required',
        ]);

        $app_id       = Configuration::where('name', 'app_id')->first();
        $secret_token = Configuration::where('name', 'secret_token')->first();

        $app_id->value = $data['app_id'];
        $app_id->save();

        $secret_token->value = $data['secret_token'];
        $secret_token->save();

        return back()->withSuccess('Informacion Actualizada');
    }

    public function updateInformation(Request $request)
    {
        $data = $request->validate([
            'information'   => ''
        ]);

        $config = Configuration::where('name', 'information')->first();

        $config->update(['value' => $data['information']]);

        return back()->withSuccess('Informacion actualizada');
    }

    public function updateMission(Request $request)
    {
        $data = $request->validate([
            'mission'   => ''
        ]);

        $config = Configuration::where('name', 'mission')->first();

        $config->update(['value' => $data['mission']]);

        return back()->withSuccess('Nosotros actualizado');
    }
    
}
