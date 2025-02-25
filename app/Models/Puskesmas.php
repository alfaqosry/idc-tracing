<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_puskesmas',
        'kec', 
      
    ];

    public function petugaspukesmas()
    {
        return $this->hasOne(Petugasuks::class);
    }
}
