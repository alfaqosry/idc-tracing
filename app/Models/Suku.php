<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suku extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_suku',
        'daerah', 
      
    ];

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
}
