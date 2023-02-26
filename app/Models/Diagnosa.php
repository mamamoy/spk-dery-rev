<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;
    protected $table = 'konsuls';
    protected $fillable =['penyakit_id', 'nama_pasien', 'username'];

    public function dataPenyakit()
    {
        return $this->belongsTo(TKModel::class);
    }
}
