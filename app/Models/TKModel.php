<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TKModel extends Model
{
    use HasFactory;
    protected $table = 'penyakits';
    protected $fillable = ['kode', 'nama_penyakit', 'definisi', 'solusi'];

    public function gejala()
    {
        return $this->belongsToMany(Gejala::class, 'relasis', 'penyakit_id', 'gejala_id');
    }

    public function related_penyakit()
{
    return $this->belongsToMany(TKModel::class, 'relasis', 'penyakit_id', 'related_penyakit_id');
}

    public function relasi()
    {
        return $this->hasMany(Relasi::class, 'penyakit_id', 'id');
    }

    public function relasis()
    {
        return $this->hasMany(Relasi::class);
    }
}
