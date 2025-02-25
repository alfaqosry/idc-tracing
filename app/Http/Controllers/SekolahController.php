<?php

namespace App\Http\Controllers;

use App\Imports\SekolahImport;
use Illuminate\Http\Request;
use App\Models\Sekolah;
use Maatwebsite\Excel\Facades\Excel;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sekolah = Sekolah::all();
        return view('pages.daftarsekolah.index2', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.daftarsekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'kec' => 'required',
            'npsn' => 'required'    
        ]);

        $sekolah = $request->all();


        $sekolah = Sekolah::create($sekolah);


        return redirect()->route('sekolah.index')->with('sukses', 'Sekolah berhasil di tambahkan');
    }

    public function importExcel(Request $request)
    {


        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);




        $import = Excel::import(new SekolahImport, $request->file('file'));
       

        return redirect()->back()->with('success', 'Data Sekolah berhasil diimport!');
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
            'nama_sekolah' => 'required',
            'kec' => 'required',
            'npsn' => 'required',

        ]);

        $sekolah = Sekolah::find($id);

        $sekolah->update($request->all());


        return redirect()->route('sekolah.index')->with('sukses', 'Sekolah berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sekolah = Sekolah::find($id);
        $sekolah->delete();
        return redirect()->route('sekolah.index')->with('sukses', 'Sekolah berhasil di hapus');
    }
}
