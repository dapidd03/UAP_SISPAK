<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory; 

    protected $table = 'diagnosa';

    protected $fillable = ['pasien_id', 'penyakit_id', 'persentase'];

    public $timestamps = false;

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class); 
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class); 
    }
}
