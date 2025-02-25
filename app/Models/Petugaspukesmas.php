<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugaspukesmas extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jenis_kelamin', 
        'tanggal_lahir', 
        'tempat_lahir', 
        'puskesmas_id', 
        'pendidikan', 
        'no_hp', 
        'alamat', 
      
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class);
    }
}
