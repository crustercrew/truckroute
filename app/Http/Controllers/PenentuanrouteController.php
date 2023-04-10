<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\armadas;
use App\Models\locations;

class PenentuanrouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $armadas = armadas::all();
        $penentuanroute = DB::table('rute')
        ->join('armadas','armadas.id','=','rute.id_armada')
        ->join('locations','locations.id','=','rute.id_tujuan')
        ->orderBy('rute.tanggal','desc')
        ->orderBy('armadas.no_lambung','asc')
        ->orderBy('locations.id','asc')
        ->get(array(
            'rute.*','armadas.no_lambung','locations.nama_tempat','locations.volume','locations.kecamatan','rute.status'
        ));
        return view('dashboard.penentuanmenu.index_penentuan', [
            'title' => 'Data Armada',
            'name' => 'DLHK Sidoarjo',
            'penentuanroute' => $penentuanroute,
            'armada' => $armadas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $armada = armadas::all();
        $locationsstart = locations::where('nama_tempat','like','%Dlhk%')->get();
        // $locations = locations::where('nama_tempat','not like','%TPA%')->groupBy('Kecamatan')->get(array('id','Kecamatan'));
        $locations = locations::groupBy('Kecamatan')->get(array('Kecamatan'));
        $locationsend = locations::where('nama_tempat','like','%TPA%')->get();

        return view('dashboard.penentuanmenu.create_rute_penentuan', [
            'title' => 'Rute Pengangkutan',
            'name' => 'DLHK Sidoarjo',
            'armada' => $armada,
            'locations' => $locations,
            'locationsend' => $locationsend,
            'locationstart' => $locationsstart
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            DB::transaction(function () use ($request) {
                //dd($lokasiada);
                $lokasiawalada = DB::select('select count(id) as jumlah from rute where id_armada = '.$request->armada.' and id_tujuan = 1 and tanggal = "'.$request->tanggal.'"');
                
                //dd($lokasiawalada[0]->jumlah);
                if($lokasiawalada[0]->jumlah == 0){
                    DB::table('rute')->insert(
                                [
                                    'id_armada' => $request->armada,
                                    'id_tujuan' => 1,
                                    'status' => 'AWAL',
                                    'tanggal' => $request->tanggal,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s"),
                                    'deleted' => 0
                                ]
                            );
                }

                // $lokasiada = DB::select('select id_tujuan from rute where id_armada = '.$request->armada.' and tanggal = "'.$request->tanggal.'"');
                
                $lokasi = DB::select('select * from locations where Kecamatan in ("'.$request->kecamatan1.'","'.$request->kecamatan2.'") and nama_tempat not like "%Dlhk%" and nama_tempat not like "%TPA%" order by rand() limit '.$request->batas.'');
                foreach($lokasi as $lokasi){
                    DB::table('rute')->insert(
                        [
                            'id_armada' => $request->armada,
                            'id_tujuan' => $lokasi->id,
                            'status' => 'TPS',
                            'tanggal' => $request->tanggal,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s"),
                            'deleted' => 0
                        ]
                    );
                }
                
            });

            return redirect()->route('penentuanroute.index')
        ->with('success','data penentuan rute telah dibuat!');
        } catch (Exception $e) {
            return redirect()->route('penentuanroute.index')
            ->with('success','data gagal dibuat!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $armadas = armadas::all();
        $find = $request->armada;
        $findarmadawhere =  [
            ['no_lambung' ,'=' ,$find],
            ['tanggal' ,'=' ,$request->tanggal],
            ['nama_tempat' ,'not like' ,'Dlhk kota sidoarjo']
           ];

        $findarmada =DB::table('rute')
        ->join('armadas','armadas.id','=','rute.id_armada')
        ->join('locations','locations.id','=','rute.id_tujuan')
        ->orderBy('rute.tanggal','desc')
        ->orderBy('armadas.no_lambung','asc')
        ->orderBy('locations.id','asc')
        ->where($findarmadawhere)
        ->get(array(
            'rute.*','rute.tanggal','armadas.no_lambung','locations.nama_tempat','locations.volume','locations.kecamatan','rute.status'
        ));
        $findlocation = DB::table('rute')
        ->join('armadas','armadas.id','=','rute.id_armada')
        ->join('locations','locations.id','=','rute.id_tujuan')
        ->orderBy('rute.tanggal','desc')
        ->orderBy('armadas.no_lambung','asc')
        ->orderBy('locations.id','asc')
        ->where($findarmadawhere)
        ->get(array(
            'rute.*','rute.id_tujuan','armadas.no_lambung','locations.nama_tempat','locations.latitude','locations.longtitude','locations.volume','locations.kecamatan','rute.status'
        ));

        return view('dashboard.penentuanmenu.find_penentuan_armada', [
            'title' => 'Data Armada',
            'name' => 'DLHK Sidoarjo',
            'findarmada' => $findarmada,
            'armada' => $armadas,
            'findlocation' => $findlocation
        ]);
    }

    public function findarmada(Request $request)
    {
        $armadas = armadas::all();
        $find = $request->armada;
        $findlocationwhere = [
            ['no_lambung' ,'=' ,$find],
            ['nama_tempat' ,'not like' ,'Dlhk kota sidoarjo']
           ];
        $findarmada = DB::table('rute')
        ->join('armadas','armadas.id','=','rute.id_armada')
        ->join('locations','locations.id','=','rute.id_tujuan')
        ->orderBy('rute.tanggal','desc')
        ->orderBy('armadas.no_lambung','asc')
        ->orderBy('locations.id','asc')
        ->where($findlocationwhere)
        ->get(array(
            'rute.*','armadas.no_lambung','locations.nama_tempat','locations.volume','locations.kecamatan','rute.status'
        ));


        $findlocation = DB::table('rute')
        ->join('armadas','armadas.id','=','rute.id_armada')
        ->join('locations','locations.id','=','rute.id_tujuan')
        ->orderBy('rute.tanggal','desc')
        ->orderBy('armadas.no_lambung','asc')
        ->orderBy('locations.id','asc')
        ->where($findlocationwhere)
        ->get(array(
            'rute.*','rute.id_tujuan','armadas.no_lambung','locations.nama_tempat','locations.latitude','locations.longtitude','locations.volume','locations.kecamatan','rute.status'
        ));

        return view('dashboard.penentuanmenu.find_penentuan_armada', [
            'title' => 'Data Armada',
            'name' => 'DLHK Sidoarjo',
            'findarmada' => $findarmada,
            'armada' => $armadas,
            'findlocation' => $findlocation
        ]);
    }
    public function tanggal(Request $request)
    {
        $armadas = armadas::all();
        $findtanggal = $request->tanggal;
        $findlocationwhere = [
            ['tanggal' ,'=' ,$findtanggal],
            ['nama_tempat' ,'not like' ,'Dlhk kota sidoarjo']
           ];

        $findtanggal = DB::table('rute')
        ->join('armadas','armadas.id','=','rute.id_armada')
        ->join('locations','locations.id','=','rute.id_tujuan')
        ->orderBy('rute.tanggal','desc')
        ->orderBy('armadas.no_lambung','asc')
        ->where($findlocationwhere)
        ->get(array(
            'rute.*','armadas.no_lambung','locations.nama_tempat','locations.volume','locations.kecamatan','rute.status'
        ));

        $findlocation = DB::table('rute')
        ->join('armadas','armadas.id','=','rute.id_armada')
        ->join('locations','locations.id','=','rute.id_tujuan')
        ->orderBy('rute.tanggal','desc')
        ->orderBy('armadas.no_lambung','asc')
        ->orderBy('locations.id','asc')
        ->where($findlocationwhere)
        ->get(array(
            'rute.*','rute.id_tujuan','armadas.no_lambung','locations.nama_tempat','locations.latitude','locations.longtitude','locations.volume','locations.kecamatan','rute.status'
        ));

        return view('dashboard.penentuanmenu.find_penentuan_armada', [
            'title' => 'Data Armada',
            'name' => 'DLHK Sidoarjo',
            'findarmada' => $findtanggal,
            'armada' => $armadas,
            'findlocation' => $findlocation
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $armadas = armadas::all();
        $destroy = $request->armada;
        $penentuanroute = DB::table('rute')
        ->join('armadas','armadas.id','=','rute.id_armada')
        ->join('locations','locations.id','=','rute.id_tujuan')
        ->orderBy('rute.tanggal','desc')
        ->orderBy('armadas.no_lambung','asc')
        ->orderBy('locations.id','asc')
        ->get(array(
            'rute.*','armadas.no_lambung','locations.nama_tempat','locations.volume','locations.kecamatan','rute.status'
        ));
        DB::delete('delete from `rute` where id_armada = ?', [$destroy]);
        DB::delete('delete from `hasilrute` where id_armada = ?', [$destroy]);
        return view('dashboard.penentuanmenu.index_penentuan', [
            'title' => 'Data Armada',
            'name' => 'DLHK Sidoarjo',
            'penentuanroute' => $penentuanroute,
            'armada' => $armadas
        ]);
    }
    public function destroypertanggal(Request $request)
    {
        $armadas = armadas::all();
        $destroyarmada = $request->armada;
        $penentuanroute = DB::table('rute')
        ->join('armadas','armadas.id','=','rute.id_armada')
        ->join('locations','locations.id','=','rute.id_tujuan')
        ->orderBy('rute.tanggal','desc')
        ->orderBy('armadas.no_lambung','asc')
        ->orderBy('locations.id','asc')
        ->get(array(
            'rute.*','armadas.no_lambung','locations.nama_tempat','locations.volume','locations.kecamatan','rute.status'
        ));
        DB::delete('delete from `rute` where id_armada = ? and tanggal= ?', [$destroyarmada,$request->tanggal]);
        DB::delete('delete from `hasilrute` where id_armada = ? and tanggal= ?', [$destroyarmada,$request->tanggal]);
        return view('dashboard.penentuanmenu.index_penentuan', [
            'title' => 'Data Armada',
            'name' => 'DLHK Sidoarjo',
            'penentuanroute' => $penentuanroute,
            'armada' => $armadas
        ]);
    }
}
