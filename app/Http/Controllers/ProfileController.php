<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\Suku;
use App\Models\User;
use App\Models\Tesdiabetes;
use App\Models\Petugaspukesmas;
use App\Models\Petugasuks;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sekolah = Sekolah::all();
        $suku = Suku::all();

        $tes = Tesdiabetes::with('user')->latest()->get();
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->hasRole('siswa')) {
            $siswa = Siswa::with('user')->where('user_id', auth()->user()->id)->first();
        } elseif ($user->hasRole('puskesmas')) {
            $siswa = Petugaspukesmas::with('user')->where('user_id', auth()->user()->id)->first();
        }elseif ($user->hasRole('uks')){

            $siswa = Petugasuks::with('user')->where('user_id', auth()->user()->id)->first();
        }elseif ($user->hasRole('idc')){

            $siswa = Petugasuks::with('user')->where('user_id', auth()->user()->id)->first();
        }

    

        return view('pages.profile.index', compact('siswa', 'suku', 'sekolah', 'tes'));
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
