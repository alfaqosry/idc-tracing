<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugasuks extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jenis_kelamin', 
        'tanggal_lahir', 
        'tempat_lahir', 
        'sekolah_id', 
        'pendidikan', 
        'no_hp', 
        'alamat', 
      
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    protected static function booted()
    {
        static::deleting(function ($petugasuks) {
            if ($petugasuks->user) {
                $petugasuks->user->delete();
            }
        });
    }
}
