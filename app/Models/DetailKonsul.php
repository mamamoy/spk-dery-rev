<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKonsul extends Model
{
    use HasFactory;
    protected $table = 'detail_konsuls';
    protected $fillable =['konsul_id', 'gejala_id'];

    public function dataGejala()
    {
        return $this->belongsTo(Gejala::class, 'gejala_id', 'id');
    }
    public function dataKonsul()
    {
        return $this->belongsTo(Diagnosa::class);
    }
}
