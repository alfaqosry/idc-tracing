<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_sekolah',
        'kec', 
        'npsn'
      
    ];
    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
    public function petugasuks()
    {
        return $this->hasOne(Petugasuks::class);
    }
}
