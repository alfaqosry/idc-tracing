<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tesdiabetes extends Model
{
    use HasFactory;
    protected $fillable = [
        'tinggi_badan',
        'berat_badan', 
        'tekanan_darah', 
        'kadar_gula', 
        'aktifitas_fisik', 
        'kosumsi_makanan', 
        'merokok', 
        'tekanan', 
        'keluarga', 
        'selectkeluarga',
        'user_id',
        'totalpoin',
        'merokok_pasif',
        'priode_id'
      
    ];
   

    public function priode()
    {
        return $this->belongsTo(Priode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
