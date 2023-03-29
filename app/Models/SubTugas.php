<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTugas extends Model
{
    use HasFactory;

    protected $table = "sub_tugas";

    protected $guarded = ['id'];

    public function tugas(){
        return $this->belongsTo(Tugas::class);
    }

    public function siswa(){
        return $this->belongsTo(SiswaModel::class);
    }
    
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
