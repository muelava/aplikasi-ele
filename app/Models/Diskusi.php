<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    use HasFactory;

    protected $table = "diskusi";

    protected $guarded = ['id'];

    public function mata_pelajaran()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function siswa()
    {
        return $this->belongsTo(SiswaModel::class);
    }

    public function guru()
    {
        return $this->belongsTo(GuruModel::class);
    }

    public function sub_diskusi()
    {
        return $this->hasMany(SubDiskusi::class);
    }
}
