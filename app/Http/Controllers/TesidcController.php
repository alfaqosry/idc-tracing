<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tesdiabetes;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use App\Helpers\Idc;

class TesidcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $priodeid = $id;
        return view('pages.tes.index', compact('priodeid'));
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
        // dd($request->all());

        $request->validate([
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'tekanan_darah' => 'required',
            'kadar_gula' => 'required',
            'aktifitas_fisik' => 'required',

            'merokok' => 'required',
            'tekanan' => 'required',
            'keluarga' => 'required',
        ]);


        $siswa = Siswa::with('user')->where('user_id', Auth()->user()->id)->first();

        $requestobjek = json_decode(json_encode($request->all()));


        // dd($request->sayur);

        $polakonsumsi = [
            'sayur' => isset($request->sayur) && $request->sayur == "Ya" ? 0 : 1,
            'makan_buah' => isset($request->makan_buah) && $request->makan_buah == "Ya" ? 0 : 1,
            'minum_bersoda' => isset($request->minum_bersoda) && $request->minum_bersoda == "Ya" ? 1 : 0,
            'minuman_manis' => isset($request->minuman_manis) && $request->minuman_manis == "Ya" ? 1 : 0,
            'makanan_cepat_saji' => isset($request->makanan_cepat_saji) && $request->makanan_cepat_saji == "Ya" ? 1 : 0,
        ];

        // dd($request->merokok_pasif);

        $tesdiabetes = Tesdiabetes::create([
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'tekanan_darah' => $request->tekanan_darah,
            'kadar_gula' => $request->kadar_gula,
            'aktifitas_fisik' => $request->aktifitas_fisik,
            'kosumsi_makanan' => json_encode($polakonsumsi),
            'merokok' => $request->merokok,
            'tekanan' => $request->tekanan,
            'keluarga' => $request->keluarga,
            'selectkeluarga' => $request->selectkeluarga,
            'user_id' => auth()->user()->id,
            'totalpoin' => 0,
            'priode_id' => $request->priodeid,
            'merokok_pasif' => $request->merokok_pasif
        ]);

        $hasiltes = Idc::get_tes($siswa, $tesdiabetes);

        $tesdiabetes->update([
            'totalpoin' => $hasiltes['total_poin']
        ]);




        return redirect()->route('tesidc.show', $tesdiabetes->id);
    }


    public function hasiltes(string $id)
    {

        $tes = Tesdiabetes::with('user')->where('id', $id)->first();
        $siswa = Siswa::with('user')->where('user_id', $tes->user_id)->first();
        $polakosumsi = json_decode($tes->kosumsi_makanan, true);
        $hasiltes = Idc::get_tes($siswa, $tes);



        return view('pages.tes.hasiltes', [
            'siswa' => $siswa,
            'tes' => $tes,
            'hasiltes' => $hasiltes,
            'polakosumsi' => $polakosumsi

        ]);
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
