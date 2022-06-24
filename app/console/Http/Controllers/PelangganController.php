<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Golongan, User, Pelanggan};

class PelangganController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::orderBy('id', 'desc')->get();

        return view('apps.pelanggan.index')->with('pelanggan', $pelanggan);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan = Golongan::get();
        $pengguna = User::get();

        return view('apps.pelanggan.create')->with('golongan', $golongan)
                                            ->with('pengguna', $pengguna);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $pelanggan = $request->all();

        Pelanggan::create($pelanggan);
        return redirect()->route('pelanggan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(pelanggan $pelanggan)
    {
        $golongan = Golongan::get();
        $pengguna = User::get();
        
        return view('apps.pelanggan.edit')->with('pelanggan', $pelanggan)
                                          ->with('golongan', $golongan)
                                          ->with('pengguna', $pengguna);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pelanggan = Pelanggan::findOrFail($request->id);

        $pelanggan->update($request->all());
        return redirect()->route('pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $pelanggan = Pelanggan::findOrFail($request->id);
        $pelanggan->delete();

        return redirect()->back();
    }
}
