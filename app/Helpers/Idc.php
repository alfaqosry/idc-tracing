<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Idc
{
    public static function get_tes($siswa, $tes)
    {



        // Inisialisasi variabel
        $totalPoin = 0;
        $poinDetail = [];

        // Hitung umur
        $umur = Carbon::parse($siswa->tanggal_lahir)->age;

        // Hitung poin berdasarkan jenis kelamin
        if ($siswa->jenis_kelamin == "Perempuan") {
            $poinDetail['jenis_kelamin'] = 1;
            $totalPoin += 1;
        } else {
            $poinDetail['jenis_kelamin'] = 0;
        }

        // Hitung poin berdasarkan usia
        if ($umur > 45) {
            $poinDetail['usia'] = 1;
            $totalPoin += 1;
        } else {
            $poinDetail['usia'] = 0;
        }

        // Hitung poin berdasarkan IMT
        $resultimt = $tes->berat_badan / (($tes->tinggi_badan / 100) ** 2);
        $imt = round($resultimt, 2);


        if ($imt >= 30) {
            $poinDetail['imt'] = 2;
            $totalPoin += 2;
        } elseif ($imt >= 25 && $imt <= 29.9) {
            $poinDetail['imt'] = 1;
            $totalPoin += 1;
        } elseif ($imt < 25) {
            $poinDetail['imt'] = 0;
        }

        // Hitung poin untuk tekanan darah
        $poinDetail['tekanan_darah'] = $tes->tekanan_darah == 'Ya' ? 1 : 0;
        $totalPoin += $poinDetail['tekanan_darah'];

        // Hitung poin untuk riwayat keluarga
        $poinDetail['keluarga'] = $tes->keluarga == 'Ya' ? 1 : 0;
        $totalPoin += $poinDetail['keluarga'];

        // Hitung poin untuk aktivitas fisik
        $poinDetail['aktivitas_fisik'] = $tes->aktifitas_fisik == '<60 menit dalam sehari, kurang dari 5 hari dalam seminggu' ? 1 : 0;
        $totalPoin += $poinDetail['aktivitas_fisik'];

        // Hitung poin untuk kadar gula darah
        $poinDetail['kadar_gula'] = $tes->kadar_gula > 200 ? 1 : 0;


        $konsumsiMakanan = json_decode($tes->kosumsi_makanan, true);



        // $polakonsumsi = [];
        // $polakonsumsi['sayur'] = $konsumsiMakanan['sayur'] == "Ya" ? 0 : 1;
        // $polakonsumsi['makan_buah'] = $konsumsiMakanan['makan_buah'] == "Ya" ? 0 : 1;
        // $polakonsumsi['minum_bersoda'] = $konsumsiMakanan['minum_bersoda'] == "Ya" ? 1 : 0;
        // $polakonsumsi['minuman_manis'] = $konsumsiMakanan['minuman_manis'] == "Ya" ? 1 : 0;
        // $polakonsumsi['makanan_cepat_saji'] = $konsumsiMakanan['makanan_cepat_saji'] == "Ya" ? 1 : 0;

        $totalPoinkosumsi = array_sum($konsumsiMakanan);
       


        if ($totalPoinkosumsi >= 3) {

            $poinDetail['diet'] = 1;
        } elseif ($totalPoinkosumsi < 3) {
            $poinDetail['diet'] = 0;
        }


        // Hitung poin untuk pola diet

        $totalPoin += $poinDetail['diet'];


        // Hitung poin untuk merokok
        $poinDetail['merokok'] = $tes->merokok == 'Ya' ? 1 : 0;
        $totalPoin += $poinDetail['merokok'];

        $poinDetail['merokok_pasif'] = $tes->merokok_pasif == 'Ya' ? 1 : 0;
        $totalPoin += $poinDetail['merokok_pasif'];

        // $poinDetail['merokok_pasif'] = $tes->merokok == 'Ya' ? 1 : 0;
        // $totalPoin += $poinDetail['merokok_pasif'];
        
        // Hitung poin untuk stres
        $poinDetail['stres'] = $tes->tekanan == 'Ya' ? 1 : 0;
        $totalPoin += $poinDetail['stres'];

       
        $data = [
            'total_poin' => $totalPoin,
            'point_detail' => $poinDetail,
            'imt' => $imt
        ];

        return $data;
    }

    public static function poin($point)
    {

        if ($point < 1) {
            echo "<span class='badge bg-success'> 0 Poin</span>";
        } elseif ($point == 1) {
            echo "<span class='badge bg-danger'> 1 Poin</span>";
        } elseif ($point == 2) {
            echo "<span class='badge bg-danger'> 2 Poin</span>";
        }
    }

    public static function totalpoin($point)
    {

        if ($point <= 5) {
            echo "<span class='badge bg-success me-2'>" . $point . " Poin</span>";
            echo "<span class='badge bg-success'> Tidak Berisiko Diabetes </span>";
        } else {
            echo "<span class='badge bg-warning me-2'>" . $point . " Poin</span>";
            echo "<span class='badge bg-warning'>Berisiko Diabetes</span>";
        }
    }


    public static function getKelas($tahunAjaranMasuk)
    {

        $tahunMasuk = explode('/', $tahunAjaranMasuk);
        $tahunMasukAwal = (int)$tahunMasuk[0];


        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;


        if ($currentMonth >= 7) {
            $tahunAjaranSekarang = $currentYear . '/' . ($currentYear + 1);
        } else {
            $tahunAjaranSekarang = ($currentYear - 1) . '/' . $currentYear;
        }


        $kelas = $currentYear - $tahunMasukAwal;



        if ($kelas == 0) {
            return 'X';
        } elseif ($kelas == 1) {
            return 'XI';
        } elseif ($kelas == 2) {
            return 'XII';
        }

        return "LULUS";
    }
}
