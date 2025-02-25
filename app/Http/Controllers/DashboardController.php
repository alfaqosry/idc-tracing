<?php

namespace App\Http\Controllers;

use App\Models\Petugaspukesmas;
use App\Models\Petugasuks;
use App\Models\Puskesmas;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Tesdiabetes;
use Illuminate\Http\Request;
use App\Models\Priode;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth()->user()->id);


        if ($user->hasRole('puskesmas')) {
            $totalsekolah = Sekolah::count();
            $petugaspuskesmas = Petugaspukesmas::where('user_id', Auth()->user()->id)->first();
            $puskesmas = Puskesmas::findOrFail($petugaspuskesmas->puskesmas_id);
            $totalsiswa = Siswa::count();
            return view('pages.dashboard.index', compact('puskesmas', 'totalsiswa', 'totalsekolah'));
        } elseif ($user->hasRole('uks')) {
            $petugasuks = Petugasuks::where('user_id', Auth()->user()->id)->first();

            $sekolah = Sekolah::findOrFail($petugasuks->sekolah_id);

            $totalsekolah = Sekolah::where('id', $petugasuks->sekolah_id)->count();
            $totalsiswa = Siswa::where('sekolah_id', $petugasuks->sekolah_id)->count();

            // Ambil priode paling terbaru
            $latestPriode = Priode::latest()->first();

            if ($latestPriode) {
                // Hitung jumlah user berisiko (totalpoin >= 5)
                $berisiko = Tesdiabetes::where('priode_id', $latestPriode->id)
                    ->where('totalpoin', '>=', 5)
                    ->count();

                // Hitung jumlah user tidak berisiko (totalpoin < 5)
                $tidakberisiko = Tesdiabetes::where('priode_id', $latestPriode->id)
                    ->where('totalpoin', '<', 5)
                    ->count();

                $pie = [$berisiko, $tidakberisiko];
            } else {
                $pie = [0, 0];
            }

            return view('pages.dashboard.index', compact('totalsiswa', 'sekolah', 'totalsekolah', 'pie'));
        } elseif ($user->hasRole('idc')) {
            $petugasuks = Petugasuks::where('user_id', Auth()->user()->id)->first();
            $totalsiswa = Siswa::count();
            $sekolah = Sekolah::all();
            $totalsekolah = Sekolah::count();

            return view('pages.dashboard.index', compact('totalsiswa', 'sekolah', 'totalsekolah'));
        } elseif ($user->hasRole('siswa')) {
            $totalsekolah = Sekolah::count();
            $petugasuks = Petugasuks::where('user_id', Auth()->user()->id)->first();
            $totalsiswa = Siswa::count();
            $sekolah = Sekolah::all();
            $siswa = Siswa::with(['user', 'user.tesDiabetes'])->where('user_id', Auth()->user()->id)->first();


            $label = Tesdiabetes::where('user_id', Auth()->user()->id)->pluck('created_at')->toArray();
            // $poin = Tesdiabetes::where('user_id', Auth()->user()->id)->pluck('totalpoin')->toArray();



            $poin = TesDiabetes::with('priode')
                ->get()
                ->pluck('totalpoin', 'priode.nama_priode')
                ->toArray();


            $priode =  Priode::latest()->first();

            $pointerakhir = Tesdiabetes::where('user_id', Auth()->user()->id)->where('priode_id', $priode->id)->first();

            $now = Carbon::now();

            $priode = Priode::whereDate('mulai', '<=', $now)
                ->whereDate('berakhir', '>=', $now)
                ->first();

            if ($priode != null) {
                $cektes = Tesdiabetes::where('user_id', Auth()->user()->id)->where('priode_id', $priode->id)->first();
            } else {
                $cektes = null;
            }



            return view('pages.dashboard.index', compact('totalsiswa', 'sekolah', 'totalsekolah', 'siswa', 'label', 'poin', 'priode', 'cektes', 'pointerakhir'));
        }
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
