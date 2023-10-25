<?php

namespace App\Http\Controllers;

// Pegawai Models
use App\Models\Pegawai;

use Illuminate\Http\Request;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtpegawai = Pegawai::all();
        return view('Pegawai.data-pegawai', compact('dtpegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pegawai.create-pegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Pegawai::create([
            'nama'=> $request->nama,
            'alamat'=> $request->alamat,
            'tgllhr'=> $request->tgllhr
        ]);

        return redirect('data-pegawai')->with('toast_success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peg = Pegawai::findorfail($id);
        return view('Pegawai.edit-pegawai', compact('peg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peg = Pegawai::findorfail($id);
        $peg->update($request->all());
        return redirect('data-pegawai')->with('toast_success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peg = Pegawai::findorfail($id);
        $peg->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
