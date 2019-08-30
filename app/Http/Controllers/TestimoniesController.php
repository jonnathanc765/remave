<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonie;
use App\User;
class TestimoniesController extends Controller
{

	public function index(request $request)
	{
		$providers = User::role('provider')->with('testimonies','testimonies.client')->paginate(12);
		return view('new_dashboard.admin.testimonies.index', compact('providers'));
	}

	public function show(testimonie $testimonie)
	{
		return view('new_dashboard.admin.testimonies.show', compact('testimonie'));
	}

	 public function destroy($id)
    {
        $testimonie = Testimonie::find($id);
        $testimonie->delete();
        return redirect()->route('testimonies')->withSuccess('Testimonio Eliminado ');
    }
}
