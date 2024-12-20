<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory; 

    protected $table = 'gejala';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function penyakit()
    {
        return $this->belongsToMany(Penyakit::class, 'aturan'); 
    }

    public function pasien()
    {
        return $this->belongsToMany(Pasien::class, 'tmp_gejala');
    }
}
