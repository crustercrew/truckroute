<?php

namespace App\Http\Controllers;

use App\Models\locations;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class DashboardControllers extends Controller
{
    public function index()
    {
        $locations = locations::all();

        return view('dashboard.index',[
            'title' => 'Dashboard',
            'name' => 'DLHK Sidoarjo',
            'locations' => $locations
        ]);
    }
    public function tps_location()
    {

        $locations = DB::select('select * from `locations` where nama_tempat not like "Dlhk kota sidoarjo" and nama_tempat not like "TPA Jabon"');

    	return view('dashboard.tps',[
            'title' => 'TPS Location',
            'name' => 'DLHK Sidoarjo',
            'locations' => $locations,

        ]);
    }
    public function register()
    {
        return view('dashboard.register',[
            'title' => 'Dashboard Register',
            'name' => 'DLHK Sidoarjo'
        ]);
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|min:5|max:20',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:50'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        
        user::create($validatedData);

        $request->session()->flash('status', 'Registration successful!! Please Login');

        return redirect('/dashboard');
    }
}
