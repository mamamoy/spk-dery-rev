<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Relasi extends Model
{
    use HasFactory;

    protected $table = 'relasis';
    protected $fillable = ['gejala_id', 'penyakit_id'];

    public function dataPenyakit()
    {
        return $this->belongsTo(TKModel::class, 'relasis', 'id', 'penyakit_id');
    }
    public function dataGejala()
    {
        return $this->belongsToMany(Gejala::class,'relasis', 'id', 'gejala_id',);
    }

    public function penyakit()
    {
        return $this->belongsTo(TKModel::class);
    }
    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'gejala_id');
    }
}
