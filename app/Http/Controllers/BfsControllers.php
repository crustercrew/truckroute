<?php

namespace App\Http\Controllers;

use App\Models\armadas;
use App\Models\locations;
use Illuminate\Http\Request;
use DB;

class BfsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $armada = armadas::all();
        $locations = locations::all();
         DB::table('tampungrute')->delete();
          DB::table('hasilrute')->delete();
        $tampungdata = array();
        $totalarmada = DB::select('select id_armada as id,tanggal,volume from(SELECT rute.id_armada,rute.tanggal,armadas.volume,count(rute.id_armada) as jumlah FROM rute join armadas on armadas.id = rute.id_armada group by rute.id_armada,rute.tanggal,armadas.volume
        ) hasil where jumlah > 1 -- order by tanggal asc limit 1 ');
        foreach($totalarmada as $total){

            //dump([$total->id]);
            $volume = $total->volume;
            $penentuanroute = DB::select('select r.id_tujuan as id,a.nama_sopir,l.nama_tempat,l.volume,l.latitude,l.longtitude from rute r
            join armadas a on a.id = r.id_armada
            join locations l on l.id = r.id_tujuan
            where a.id = ? and l.volume > 0 and r.tanggal = ?',[$total->id,$total->tanggal]);
            foreach($penentuanroute as $hitung){
                if (!empty($tampungdata)) {
                    $jarakdekat = collect($tampungdata)->flatten()->min();
                    $notasal = $tampungdata[array_search($jarakdekat, array_column($tampungdata, 'jarak'))]['id_asal'];
                    $nottujuan = $tampungdata[array_search($jarakdekat, array_column($tampungdata, 'jarak'))]['id_tujuan'];
                }else{
                    $notjalan = 0;
                }

                $routesisa = DB::select('select r.id_tujuan as id,r.tanggal,a.nama_sopir,l.nama_tempat,l.volume,l.latitude,l.longtitude from rute r
                join armadas a on a.id = r.id_armada
                join locations l on l.id = r.id_tujuan
                where a.id = ? and l.id not in (?,?) and r.tanggal = ?',[$total->id,$hitung->id,$notjalan,$total->tanggal]);
                $totalroutesisa = DB::select('select count(r.id_tujuan) as total from rute r
                join armadas a on a.id = r.id_armada
                join locations l on l.id = r.id_tujuan
                where a.id = ? and l.id not in (?,?) and r.tanggal = ?',[$total->id,$hitung->id,$notjalan,$total->tanggal]);
                //dd($totalroutesisa[0]->total);
                unset($tampungdata);
                $tampungdata = array();

                foreach($routesisa as $tampung){
                    $jarak = DB::select('select (6371 * acos(
                                cos( radians(?) )
                                * cos( radians( ? ) )
                                * cos( radians( ? ) - radians(?) )
                                + sin( radians(?) )
                                * sin( radians( ? ) )
                                ) ) as distance',[$tampung->latitude,$hitung->latitude,$hitung->longtitude,$tampung->longtitude,$tampung->latitude,$hitung->latitude]);

                    //dd($jarak[0]->distance);
                    array_push($tampungdata, array(
                        'id_armada' => $total->id,
                        'id_asal'=>$hitung->id,
                        'id_tujuan'=>$tampung->id,
                        'volume'=>$tampung->volume,
                        'jarak'=>$jarak[0]->distance)
                    );
                   // dump($tampungdata);
                    DB::table('tampungrute')->insert(
                        [
                            'id_armada' => $total->id,
                            'tanggal' => $total->tanggal,
                            'id_asal' => $hitung->id,
                            'id_tujuan' => $tampung->id,
                            'jarak' => $jarak[0]->distance,
                        ]
                    );

                }
                    $jarakdekat = collect(array_column($tampungdata, 'jarak'))->flatten()->min();
                    $hasildekat = $tampungdata[array_search($jarakdekat, array_column($tampungdata, 'jarak'))];
                  //  dd($hasildekat['id_asal']);
                    DB::table('hasilrute')->insert(
                        [
                            'id_armada' => $total->id,
                            'tanggal' => $total->tanggal,
                            'id_asal' => $hasildekat['id_asal'],
                            'id_tujuan' => $hasildekat['id_tujuan'],
                          	'volume_tujuan' => $hasildekat['volume'],
                            'jarak' => $hasildekat['jarak'],
                        ]
                    );
              
                    $volume = $volume - $hasildekat['volume'];

                    for($exp=1; $exp < $totalroutesisa[0]->total; $exp++){

                        $tujuanawal = DB::select('select r.id_tujuan as id,a.nama_sopir,l.nama_tempat,l.volume,l.latitude,l.longtitude
                            from hasilrute r
                            join armadas a on a.id = r.id_armada
                            join locations l on l.id = r.id_tujuan
                            where a.id = ?   and r.tanggal = ? order by r.id desc limit 1',[$total->id,$total->tanggal]);

                        $hitungulang = DB::select('select r.id_tujuan as id,a.nama_sopir,l.nama_tempat,l.volume,l.latitude,l.longtitude from tampungrute r
                             join armadas a on a.id = r.id_armada
                             join locations l on l.id = r.id_tujuan
                             where a.id = ?  and r.id_tujuan not in (select * from (select id_tujuan from hasilrute order by id desc limit 1) hasil) and r.tanggal = ?',[$total->id,$total->tanggal]);
                        DB::table('tampungrute')->delete();
                        unset($tampungdata);
                        $tampungdata = array();
                        //dump($tujuanawal);
                        
                        foreach($hitungulang as $hitungulangterus){
                             // if( $hitungulangterus->volume <= $volume ){
                                    $jarak = DB::select('select (6371 * acos(
                                                cos( radians(?) )
                                                * cos( radians( ? ) )
                                                * cos( radians( ? ) - radians(?) )
                                                + sin( radians(?) )
                                                * sin( radians( ? ) )
                                                ) ) as distance',[$hitungulangterus->latitude,$tujuanawal[0]->latitude,$tujuanawal[0]->longtitude,$hitungulangterus->longtitude,$hitungulangterus->latitude,$tujuanawal[0]->latitude]);

                                    //dd($jarak[0]->distance);
                                    array_push($tampungdata, array(
                                        'id_armada' => $total->id,
                                        'id_asal'=> $tujuanawal[0]->id,
                                        'id_tujuan'=>$hitungulangterus->id,
                                        'volume'=>$hitungulangterus->volume,
                                        'jarak'=>$jarak[0]->distance)
                                    );
                                  // dump($tampungdata);
                                    
                                    DB::table('tampungrute')->insert(
                                        [
                                            'id_armada' => $total->id,
                                            'tanggal' => $total->tanggal,
                                            'id_asal' => $tujuanawal[0]->id,
                                            'id_tujuan' => $hitungulangterus->id,
                                            'jarak' => $jarak[0]->distance,
                                        ]
                                    );
                            // }
                        }
                         
                        $jarakdekat = collect(array_column($tampungdata, 'jarak'))->flatten()->min();
                        $hasildekat = $tampungdata[array_search($jarakdekat, array_column($tampungdata, 'jarak'))];
                        // dump($hasildekat['volume']."-".$volume );
                        if($hasildekat['volume'] <= $volume){
                            DB::table('hasilrute')->insert(
                                [
                                    'id_armada' => $total->id,
                                    'tanggal' => $total->tanggal,
                                    'id_asal' => $hasildekat['id_asal'],
                                    'id_tujuan' => $hasildekat['id_tujuan'],
                                  	'volume_tujuan' => $hasildekat['volume'],
                                    'jarak' => $hasildekat['jarak'],
                                ]
                            );
                        }
                        
                        $volume = $volume - $hasildekat['volume'];
                       // dump($jarakdekat);
                    }
                    break;
            }

        }

        $hasilakhir = DB::select('select hr.tanggal,a.nama_sopir,a.no_pol,a.volume as volume_armada,a.no_lambung,l1.nama_tempat as asal,l2.nama_tempat as tujuan,l2.volume,round(hr.jarak,2) as jarak from hasilrute hr
                    join armadas a on a.id = hr.id_armada
                    join locations l1 on l1.id = hr.id_asal
                    JOIN locations l2 on l2.id = hr.id_tujuan
                    order by hr.tanggal desc
                    ');
        return view('dashboard.prosesmenu.routebfs', [
        'title' => 'Data Proses BFS',
        'name' => 'DLHK Sidoarjo','penentuanroute' => $hasilakhir,
        'armada' => $armada
    ]);
    }

    public function updatevolume()
    {
            $armadas = armadas::all();
        $route = DB::table('rute')
        ->join('armadas','armadas.id','=','rute.id_armada')
        ->join('locations','locations.id','=','rute.id_tujuan')
        ->orderBy('rute.tanggal','desc')
        ->orderBy('armadas.no_lambung','asc')
        ->orderBy('locations.id','asc')
        ->get(array(
            'rute.*','armadas.no_lambung','locations.nama_tempat','locations.volume','locations.kecamatan','rute.status'
        ));
        $locations = locations::all();
            $penentuanroute = DB::select('select * from locations where volume < 1');
            foreach($penentuanroute as $hitung){
               DB::table('locations')->where('id', $hitung->id)->update(
                 [
                   'volume' => rand(3,6),
                 ]
               );
            }
        }

    public function findbfs(Request $request)
    {
        
        $armadas = armadas::all();
        $findbfs = $request->armada;
        $judul = DB::select('select armadas.no_lambung, tanggal from hasilrute
        join armadas on armadas.id = hasilrute.id_armada
        where no_lambung = ? and tanggal = ? limit 1;',[$findbfs,$request->tanggal]);

        $totalvolume = DB::select('select SUM(l2.volume) AS total FROM hasilrute hr
        JOIN armadas a ON a.id = hr.id_armada
        JOIN locations l1 on l1.id = hr.id_asal
        JOIN locations l2 on l2.id = hr.id_tujuan
        WHERE no_lambung=? and tanggal = ? ', [$findbfs,$request->tanggal]);
        $totaljarak = DB::select('select ROUND(SUM(jarak), 3) AS total FROM hasilrute a WHERE id_armada=? and tanggal = ?', [$findbfs,$request->tanggal]);

        $findarmada = DB::select('select hr.tanggal,a.nama_sopir,a.no_pol,a.volume as volume_armada,a.no_lambung,l1.nama_tempat as asal,l2.nama_tempat as tujuan,l2.kecamatan as kecamatan_tujuan,l2.volume, round(hr.jarak,3) as jarak from hasilrute hr
        join armadas a on a.id = hr.id_armada
        join locations l1 on l1.id = hr.id_asal
        JOIN locations l2 on l2.id = hr.id_tujuan
        where a.no_lambung=? and hr.tanggal=?',[$findbfs,$request->tanggal]);

        $findlocation = DB::select('select hr.tanggal,a.nama_sopir,a.no_pol,a.volume as volume_armada,a.no_lambung,l1.nama_tempat as asal,l2.nama_tempat as tujuan,l2.kecamatan as kecamatan_tujuan,l2.volume,l1.latitude as latitude1,l1.longtitude as longtitude1,l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr
        join armadas a on a.id = hr.id_armada
        join locations l1 on l1.id = hr.id_asal
        JOIN locations l2 on l2.id = hr.id_tujuan
        where a.no_lambung=? and hr.tanggal=?',[$findbfs,$request->tanggal]);

        return view('dashboard.prosesmenu.find_routebfs', [
            'title' => 'Data Armada',
            'judul' => $judul,
            'name' => 'DLHK Sidoarjo',
            'findarmada' => $findarmada,
            'totalvolume' => $totalvolume,
            'totaljarak' => $totaljarak,
            'armada' => $armadas,
            'findlocation' => $findlocation
        ]);
    }

    public function findroutearmada(Request $request)
    {
        $armadas = armadas::all();
        $findbfs = $request->armada;
        $judul = DB::select('select armadas.no_lambung from hasilrute
        join armadas on armadas.id = hasilrute.id_armada
        where id_armada = ? limit 1;',[$findbfs]);
        $totaljarak = DB::select('select ROUND(SUM(jarak), 3) AS total FROM hasilrute a WHERE id_armada=?', [$findbfs]);

        $findarmada = DB::select('select hr.tanggal,a.nama_sopir,a.no_pol,a.volume as volume_armada,a.no_lambung,l1.nama_tempat as asal,l2.nama_tempat as tujuan,l2.kecamatan as kecamatan_tujuan,l2.volume,round(hr.jarak,3) as jarak from hasilrute hr
        join armadas a on a.id = hr.id_armada
        join locations l1 on l1.id = hr.id_asal
        JOIN locations l2 on l2.id = hr.id_tujuan
        where a.no_lambung=?',[$findbfs]);

        $findlocation = DB::select('select hr.tanggal,a.nama_sopir,a.no_pol,a.volume as volume_armada,a.no_lambung,l1.nama_tempat as asal,l2.nama_tempat as tujuan,l2.kecamatan as kecamatan_tujuan,l2.volume,l1.latitude as latitude1,l1.longtitude as longtitude1,l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr
        join armadas a on a.id = hr.id_armada
        join locations l1 on l1.id = hr.id_asal
        JOIN locations l2 on l2.id = hr.id_tujuan
        where a.no_lambung=?',[$findbfs]);

        return view('dashboard.prosesmenu.find_routebfsarmada', [
            'title' => 'Data Armada',
            'judul' => $judul,
            'name' => 'DLHK Sidoarjo',
            'findarmada' => $findarmada,
            'totaljarak' => $totaljarak,
            'findlocation' => $findlocation,
            'armada' => $armadas
        ]);
    }

    public function findall(Request $request)
    {
        $armadas = armadas::all();

        $judul = DB::select('select tanggal from hasilrute
        where tanggal = ? limit 1;',[$request->tanggal]);

        $totaljarak = DB::select('select ROUND(SUM(jarak), 3) AS total FROM hasilrute a WHERE tanggal=?', [$request->tanggal]);
        $findarmada = DB::select('select hr.tanggal,a.nama_sopir,a.no_pol,a.volume as volume_armada,a.no_lambung,l1.nama_tempat as asal,l2.nama_tempat as tujuan,l2.kecamatan as kecamatan_tujuan,l2.volume,round(hr.jarak,3) as jarak from hasilrute hr
        join armadas a on a.id = hr.id_armada
        join locations l1 on l1.id = hr.id_asal
        JOIN locations l2 on l2.id = hr.id_tujuan
        where hr.tanggal=?',[$request->tanggal]);

        $locations = DB::select('select * from `locations` where nama_tempat not like "Dlhk kota sidoarjo" and nama_tempat not like "TPA Jabon"');

        $armada1 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan 
        where a.no_lambung= 1 and hr.tanggal = ?',[$request->tanggal]);
        $armada2 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan 
        where a.no_lambung= 2 and hr.tanggal = ?',[$request->tanggal]);
        $armada3 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan 
        where a.no_lambung= 3 and hr.tanggal = ?',[$request->tanggal]);
        $armada4 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan 
        where a.no_lambung= 4 and hr.tanggal = ?',[$request->tanggal]);
        $armada5 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan 
        where a.no_lambung= 5 and hr.tanggal = ?',[$request->tanggal]);
        $armada6 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr
        join armadas a on a.id = hr.id_armada 
        JOIN locations l2 on l2.id = hr.id_tujuan 
        where a.no_lambung= 6 and hr.tanggal = ?',[$request->tanggal]);
        $armada7 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 7 and hr.tanggal = ?',[$request->tanggal]);
        $armada8 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 8 and hr.tanggal = ?',[$request->tanggal]);
        $armada9 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 9 and hr.tanggal = ?',[$request->tanggal]);
        $armada10 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 10 and hr.tanggal = ?',[$request->tanggal]);
        $armada11 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 11 and hr.tanggal = ?',[$request->tanggal]);
        $armada12 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 12 and hr.tanggal = ?',[$request->tanggal]);
        $armada13 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 13 and hr.tanggal = ?',[$request->tanggal]);
        $armada14 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 14 and hr.tanggal = ?',[$request->tanggal]);
        $armada15 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 15 and hr.tanggal = ?',[$request->tanggal]);
        $armada16 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 16 and hr.tanggal = ?',[$request->tanggal]);
        $armada17 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 17 and hr.tanggal = ?',[$request->tanggal]);
        $armada18 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 18 and hr.tanggal = ?',[$request->tanggal]);
        $armada19 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 19 and hr.tanggal = ?',[$request->tanggal]);
        $armada20 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 20 and hr.tanggal = ?',[$request->tanggal]);
        $armada21 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 21 and hr.tanggal = ?',[$request->tanggal]);
        $armada22 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 22 and hr.tanggal = ?',[$request->tanggal]);
        $armada23 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 23 and hr.tanggal = ?',[$request->tanggal]);
        $armada24 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 24 and hr.tanggal = ?',[$request->tanggal]);
        $armada25 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 25 and hr.tanggal = ?',[$request->tanggal]);
        $armada26 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 26 and hr.tanggal = ?',[$request->tanggal]);
        $armada27 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 27 and hr.tanggal = ?',[$request->tanggal]);
        $armada28 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 28 and hr.tanggal = ?',[$request->tanggal]);
        $armada29 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 29 and hr.tanggal = ?',[$request->tanggal]);
        $armada30 = DB::select('select l2.latitude as latitude2,l2.longtitude as longtitude2 from hasilrute hr 
        join armadas a on a.id = hr.id_armada
        JOIN locations l2 on l2.id = hr.id_tujuan where a.no_lambung= 30 and hr.tanggal = ?',[$request->tanggal]);


        return view('dashboard.prosesmenu.find_routebfsall', [
            'title' => 'Data Armada',
            'judul' => $judul,
            'name' => 'DLHK Sidoarjo',
            'locations' => $locations,
            'findarmada' => $findarmada,
            'totaljarak' => $totaljarak,
            'armada' => $armadas,
            'armada1' => $armada1,'armada2' => $armada2,'armada3' => $armada3,'armada4' => $armada4,'armada5' => $armada5,
            'armada6' => $armada6,'armada7' => $armada7,'armada8' => $armada8,'armada9' => $armada9,'armada10' => $armada10,
            'armada11' => $armada11,'armada12' => $armada12,'armada13' => $armada13,'armada14' => $armada14,'armada15' => $armada15,
            'armada16' => $armada16,'armada17' => $armada17,'armada18' => $armada18,'armada19' => $armada19,'armada20' => $armada20,
            'armada21' => $armada21,'armada22' => $armada22,'armada23' => $armada23,'armada24' => $armada24,'armada25' => $armada25,
            'armada26' => $armada26,'armada27' => $armada27,'armada28' => $armada28,'armada29' => $armada29,'armada30' => $armada30,
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
