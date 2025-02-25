<?php

namespace App\Http\Controllers;

use App\Models\Puskesmas;
use Illuminate\Http\Request;

class PuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puskesmas = Puskesmas::all();
        return view('pages.daftarpuskesmas.index', compact('puskesmas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_puskesmas' => 'required',
            'kec' => 'required'
        ]);

        $puskesmas = $request->all();


        $puskesmas = Puskesmas::create($puskesmas);


        return redirect()->route('puskesmas.index')->with('sukses', 'Puskesmas berhasil di tambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_puskesmas' => 'required',
            'kec' => 'required'
        ]);

        $puskesmas = Puskesmas::find($id);

        $puskesmas->update($request->all());


        return redirect()->route('puskesmas.index')->with('sukses', 'Puskesmas berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $puskesmas = Puskesmas::find($id);
        $puskesmas->delete();
        return redirect()->route('puskesmas.index')->with('sukses', 'Puskesmas berhasil di hapus');
    }
}
