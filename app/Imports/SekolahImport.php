<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Sekolah;

class SekolahImport implements ToModel, WithHeadingRow
{

    public function headingRow(): int
    {
        return 1; 
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       

        
         $existingSchool = Sekolah::where('nama_sekolah', $row['sekolah'])->exists();
         if ($existingSchool) {
             return null; 
         }
        return new Sekolah([
            'nama_sekolah' => $row['sekolah'],
            'kec' => $row['kecamatan']
        ]);
    }
}
