<?php

namespace App\Http\Controllers;

use App\Models\Petugasuks;
use App\Models\Priode;
use App\Models\Tesdiabetes;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\User;

use Illuminate\Http\Request;

class RiwayattesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tes = Tesdiabetes::with('user')->where('user_id', Auth()->user()->id)->latest()->get();
        $siswa = Siswa::with('user')->where('user_id', Auth()->user()->id)->first();



        return view('pages.tes.riwayattes', [
            'siswa' => $siswa,
            'tes' => $tes,


        ]);
    }


    public function riwayattessekolah()
    {

        $user = User::find(Auth()->user()->id);

        $petugasuks = Petugasuks::with('sekolah')->where('user_id', Auth()->user()->id)->first();



        if ($user->hasRole('uks')) {
            $tes = Tesdiabetes::with('user')->latest()->get();
            $siswa = Siswa::with(['user', 'user.tesDiabetes'])->where('sekolah_id', $petugasuks->sekolah_id)->get();
        } else {
            abort(403, 'Anda tidak memiliki akses');
        }

        $sekolah = Sekolah::all();




        return view('pages.tes.riwayattes-sekolah', [
            'siswa' => $siswa,
            'tes' => $tes,
            'petugas' =>  $petugasuks,
            'sekolah' => $sekolah


        ]);
    }


    public function riwayattessekolahall($id)
    {
        $user = User::find(Auth()->user()->id);
        $sekolah = Sekolah::findOrFail($id);

        $tes = Tesdiabetes::with('user')->latest()->get();
        $siswa = Siswa::with(['user', 'user.tesDiabetes'])->where('sekolah_id', $id)->get();



        return view('pages.tes.riwayat-tes-all', [
            'siswa' => $siswa,
            'tes' => $tes,
            'sekolah' =>  $sekolah


        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $tes = Tesdiabetes::with('user')->where('user_id', $id)->latest()->get();

        $tes = Priode::with('tesDiabetes')
            ->whereHas('tesDiabetes', function ($query) use ($id) {
                $query->where('user_id', $id);
            })
            ->latest()
            ->get();


        $siswa = Siswa::with('user')->where('user_id', $id)->first();



        return view('pages.tes.show', [
            'siswa' => $siswa,
            'tes' => $tes,


        ]);
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
