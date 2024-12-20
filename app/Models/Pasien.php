<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory; 

    protected $table = 'pasien';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function gejala()
    {
        return $this->belongsToMany(Gejala::class, 'tmp_gejala'); 
    }

    public function diagnosa()
    {
        return $this->hasMany(Diagnosa::class);
    }

    public function attachGejala($gejala_id)
    {
        $gejala = Gejala::find($gejala_id);
        return $this->gejala()->attach($gejala);
    }

    public function detachGejala($gejala_id)
    {
        $gejala = Gejala::find($gejala_id);
        return $this->gejala()->detach($gejala);
    }
}
