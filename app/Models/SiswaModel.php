<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    use HasFactory;
    protected $table = 'siswa';

    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function diskusi()
    {
        return $this->hasMany(Diskusi::class);
    }

    public function sub_diskusi()
    {
        return $this->hasMany(SubDiskusi::class);
    }

    public function sub_tugas()
    {
        return $this->hasMany(SubTugas::class);
    }
}
