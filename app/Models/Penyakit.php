<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function gejala()
    {
        return $this->belongsToMany(Gejala::class, 'aturan');
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
