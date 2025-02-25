<?php

namespace App\Http\Controllers;

use App\Models\Petugasuks;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetugasuksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugasuks = Petugasuks::with('user')->get();
        $sekolah = Sekolah::all();


        return view('pages.petugasuks.index', compact('petugasuks', 'sekolah'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|min:6',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'sekolah_id' => 'required|integer',
            'pendidikan' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
        ]);
    
  
        if ($validator->fails()) {
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('modal', 'tambah');
        }
    


        try {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $user->assignRole('uks');

            $petugasuks = Petugasuks::create([
                'user_id' => $user->id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'pendidikan' => $request->pendidikan,
                'sekolah_id' => $request->sekolah_id,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat


            ]);


            return redirect()->back()->with('success', 'Petugas UKS berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('modal', 'tambah')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'sekolah_id' => 'required|integer',
            'pendidikan' => 'required',
            'alamat' => 'required',
        ]);
    
  
        if ($validator->fails()) {
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('modal', 'update');
        }

        $user = User::findOrFail($id);
        try {
            $datauser = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ];
            $user->update($datauser);


            $petugas = Petugasuks::where('user_id', $id)->first();
            $datapetugas = [
                'user_id' => $user->id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'sekolah_id' => $request->sekolah_id,
                'pendidikan' => $request->pendidikan,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat


            ];
            $petugas->update($datapetugas);


            return redirect()->back()->with('success', 'Petugas UKS berhasil update');
        } catch (\Exception $e) {
            return redirect()->back()->with('modal', 'update')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $petugasuks = Petugasuks::findOrFail($id);
            $petugasuks->delete(); 
    
            return redirect()->back()->with('success', 'Data Petugas UKS berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
