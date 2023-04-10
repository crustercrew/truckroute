<?php

namespace App\Http\Controllers;

use App\Models\armadas;
use Illuminate\Http\Request;

class ArmadasControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $armada = armadas::all();

        return view('dashboard.armadamenu.armada', [
            'title' => 'Data Armada',
            'name' => 'DLHK Sidoarjo',
            'armada' => $armada
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.armadamenu.create_armada', [
            'title' => 'Input Data',
            'name' => 'DLHK Sidoarjo',
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
        $request->validate([
            'nama_sopir' => 'required|max:100',
            'status' => 'required|max:10',
            'no_pol' => 'required',
            'no_lambung' => 'required',
            'jenis_kendaraan' => 'required',
            'volume' => 'required|in:6,8,10,12,14,16',
            'tahun' => 'required'
        ]);
    
        armadas::create($request->all());
    
        return redirect()->route('armada.index')
        ->with('success','data armada telah dibuat!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\armadas  $armadas
     * @return \Illuminate\Http\Response
     */
    public function edit(armadas $armada)
    {
        return view('dashboard.armadamenu.edit_armada',[
            'title' => 'Edit Data',
            'name' => 'DLHK Sidoarjo',
        ],compact('armada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\armadas  $armadas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, armadas $armada)
    {
        $request->validate([
            'nama_sopir' => 'required|max:100',
            'status' => 'required|max:10',
            'no_pol' => 'required',
            'no_lambung' => 'required',
            'jenis_kendaraan' => 'required',
            'tahun' => 'required'
        ]);

        $armada->update($request->all());
    
        $request->session()->flash('success', 'Berhasil Diubah');
    
        return redirect()->route('armada.index')
        ->with('success','Data Armada telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\armadas  $armadas
     * @return \Illuminate\Http\Response
     */
    public function destroy(armadas $armada)
    {
        $armada->delete();
    
        return redirect()->route('armada.index')
                        ->with('success','Data Armada telah dihapus');
    }
}
