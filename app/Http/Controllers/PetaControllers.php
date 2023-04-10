<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\armadas;
use App\Models\locations;
use DB;

class PetaControllers extends Controller
{
    public function index()
    {
        $armada = armadas::all();
        $locations = locations::all();
        DB::table('tampungrute')->delete();
        DB::table('hasilrute')->delete();

        return view('dashboard.petamenu.indexpeta', [
            'title' => 'Data Armada',
            'name' => 'DLHK Sidoarjo',
            'armada' => $armada,
            'locations' => $locations
        ]);
    }
    public function findpeta(Request $request)
    {
        $armadas = armadas::all();
        $findpeta = $request->armada;
        $totaljarak = DB::select('SELECT ROUND(SUM(jarak), 3) AS total FROM hasilrute a WHERE id_armada=?', [$findpeta]);
        $findarmada = DB::select('select a.no_lambung,l1.id as id_asal,l1.nama_tempat as asal, l1.Kecamatan as kec_asal,l1.latitude as latitude1,l1.longtitude as longtitude1,l2.id as id_tujuan,l2.nama_tempat as tujuan, l2.Kecamatan as kec_tujuan,l2.latitude as latitude2,l2.longtitude as longtitude2,hr.jarak from hasilrute hr
        join armadas a on a.id = hr.id_armada
        join locations l1 on l1.id = hr.id_asal
        JOIN locations l2 on l2.id = hr.id_tujuan
        where no_lambung=?',[$findpeta]);

        return view('dashboard.petamenu.findpeta', [
            'title' => 'Data Armada',
            'name' => 'DLHK Sidoarjo',
            'findarmada' => $findarmada,
            'totaljarak' => $totaljarak,
            'armada' => $armadas
        ]);
    }
}
