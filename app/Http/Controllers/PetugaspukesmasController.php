<?php

namespace App\Http\Controllers;

use App\Models\Petugaspukesmas;
use App\Models\Puskesmas;
use App\Models\User;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugaspukesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugaspukesmas = Petugaspukesmas::with('user')->get();
        $pukesmas = Puskesmas::all();

        return view('pages.petugaspuskesmas.index', compact('petugaspukesmas', 'pukesmas'));
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
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'nullable|min:6', 
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'puskesmas_id' => 'required',
            'pendidikan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'password' => 'required'
        ]);


        try {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $user->assignRole('puskesmas');

            $petugaspukesmas = Petugaspukesmas::create([
                'user_id' => $user->id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'pendidikan' => $request->pendidikan,
                'puskesmas_id' => $request->puskesmas_id,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat


            ]);

       


            return redirect()->back()->with('success', 'Petugas UKS berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

    }


    public function kecamatanbypetugas(){

        $petugas = Petugaspukesmas::with(['user', 'puskesmas'])->where('user_id', Auth()->user()->id)->first();
        
        $sekolah = Sekolah::where('kec',$petugas->puskesmas->kec)->get();


        return view('pages.petugaspuskesmas.riwayatteskecamatan', compact('sekolah'));
       

    }

    public function siswabysekolah($id){

        $siswa = Siswa::with(['user', 'user.tesDiabetes'])->where('sekolah_id', $id )->get();

        $sekolah = Sekolah::find($id)->first();

        return view('pages.petugaspuskesmas.daftarsiswabysekolah', compact('siswa', 'sekolah'));


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
            'name' => 'required',
            'username' => 'required',
            'password' => 'nullable|min:6', 
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'puskesmas_id' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'password' => 'required'
        ]);

        $user = User::findOrFail($id);
        try {
            $datauser = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ];
            $user->update($datauser);


            $petugaspukesmas = Petugaspukesmas::where('user_id', $id)->first();
            $datapetugas = [
                'user_id' => $user->id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'pendidikan' => $request->pendidikan,
                'puskesmas_id' => $request->puskesmas_id,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat


            ];
            $petugaspukesmas->update($datapetugas);


            return redirect()->back()->with('success', 'Petugas Pukesmas berhasil update');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $petugaspukesmas = Petugaspukesmas::findOrFail($id);
            $petugaspukesmas->delete(); 
    
            return redirect()->back()->with('success', 'Data pukesmas dan user berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
