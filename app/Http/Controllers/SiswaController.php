<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\User;
use App\Models\Suku;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;
use Illuminate\Support\Facades\Response;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::with('user')->get();
        $sekolah = Sekolah::all();
        $suku = Suku::all();

        return view('pages.siswa.index', compact('siswa', 'sekolah', 'suku'));
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
            'username' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'suku_id' => 'required',
            'sekolah_id' => 'required',
            'nisn' => 'required',
            'tahunajaranmasuk' => 'required',
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

            $user->assignRole('siswa');

            $siswa = Siswa::create([
                'user_id' => $user->id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'suku_id' => $request->suku_id,
                'sekolah_id' => $request->sekolah_id,
                'nisn' => $request->nisn,
                'tahunajaranmasuk' => $request->tahunajaranmasuk,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat


            ]);
            return redirect()->back()->with('success', 'Siswa berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }







        // return redirect()->route('siswa.index')->with('sukses', 'Siswa berhasil di tambahkan');
    }

    public function importExcel(Request $request)
    {


        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);




        try {
            Excel::import(new SiswaImport, $request->file('file'));
            return redirect()->back()->with('success', 'Data berhasil diimpor!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
    
            foreach ($failures as $failure) {
                $failure->row(); // Baris yang gagal
                $failure->attribute(); // Kolom yang gagal
                $failure->errors(); // Pesan error
            }
    
            return redirect()->back()->with('error', 'Beberapa baris gagal diimpor. Periksa kembali file Anda.');
        }
    }

    public function downloadFile()
    {
        $filePath = public_path('excels/formatsiswa.xlsx');

        if (file_exists($filePath)) {
            return Response::download($filePath, 'formatsiswa.xlsx');
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
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
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'suku_id' => 'required',
            'sekolah_id' => 'required',
            'nisn' => 'required',
            'tahunajaranmasuk' => 'required',
            'alamat' => 'required',

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


            $siswa = Siswa::where('user_id', $id)->first();
            $datasiswa = [
                'user_id' => $user->id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'suku_id' => $request->suku_id,
                'sekolah_id' => $request->sekolah_id,
                'nisn' => $request->nisn,
                'tahunajaranmasuk' => $request->tahunajaranmasuk,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat


            ];
            $siswa->update($datasiswa);


            return redirect()->back()->with('success', 'Siswa berhasil update');
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
            $siswa = Siswa::findOrFail($id);
            $siswa->delete(); 
    
            return redirect()->back()->with('success', 'Data siswa dan user berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
