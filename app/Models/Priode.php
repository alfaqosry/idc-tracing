<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priode extends Model
{
    use HasFactory;


    protected $guarded = [
        'id',
    ];
    public function tesDiabetes()
    {
        return $this->hasOne(TesDiabetes::class);
    }
    
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->mulai > $model->berakhir) {
                throw new \Exception("Tanggal mulai tidak boleh lebih besar dari tanggal berakhir.");
            }
        });
    }
}
