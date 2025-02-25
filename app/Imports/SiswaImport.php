<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Suku;
use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        if (empty($row['nama']) || empty($row['email']) || empty($row['nisn'])) {
            return null; // Lewati baris ini
        }
       
        $baseUsername = strtolower(str_replace(' ', '', $row['nama']));
        $username = $baseUsername;
        $counter = 1;

       
        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

      
        $datauser = [
            'name' => $row['nama'], 
            'username' => $username,
            'email' => $row['email'],
            'password' => Hash::make($row['nisn']),
        ];

        $user = User::create($datauser);
        $user->assignRole('siswa');

      
        $suku = Suku::where('nama_suku', $row['suku'])->first();
        $sukuId = $suku ? $suku->id : 1;

       
        $sekolah = Sekolah::where('npsn', $row['npsn'])->first();
        $sekolahId = $sekolah ? $sekolah->id : 1;

       
        $datasiswa = [
            'user_id' => $user->id,
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'tempat_lahir' => $row['tempat_lahir'],
            'suku_id' => $sukuId,
            'sekolah_id' => $sekolahId,
            'nisn' => $row['nisn'],
            'tahunajaranmasuk' => $row['tahun_ajaran_masuk'],
            'no_hp' => $row['no_hp'],
            'alamat' => $row['alamat'],
        ];

        return new Siswa($datasiswa);
    }
}
