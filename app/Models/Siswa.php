<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

  

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    public function suku()
    {
        return $this->belongsTo(Suku::class);
    }

    protected static function booted()
    {
        static::deleting(function ($siswa) {
            if ($siswa->user) {
                $siswa->user->delete();
            }
        });
    }
}
