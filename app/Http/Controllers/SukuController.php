<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suku;

class SukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suku = Suku::all();
        return view('pages.daftarsuku.index', compact('suku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_suku' => 'required',
            'daerah' => 'required'
        ]);

        $suku = $request->all();


        $suku = Suku::create($suku);


        return redirect()->route('suku.index')->with('sukses', 'suku berhasil di tambahkan');
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
            'nama_suku' => 'required',
            'daerah' => 'required'
        ]);

        $suku = Suku::find($id);

        $suku->update($request->all());


        return redirect()->route('suku.index')->with('sukses', 'Suku berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suku = Suku::find($id);
        $suku->delete();
        return redirect()->route('suku.index')->with('sukses', 'Suku berhasil di hapus');
    }
}
