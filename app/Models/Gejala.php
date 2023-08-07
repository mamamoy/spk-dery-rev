<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table = 'gejalas';
    protected $fillable = ['kode_gejala', 'nama_gejala', 'penting'];

    public function penyakit()
    {
        return $this->belongsToMany(TKModel::class, 'relasis', 'gejala_id', 'penyakit_id');
    }
    public function relasi()
    {
        return $this->hasMany(Relasi::class, 'gejala_id');
    }
}
