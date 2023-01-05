<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDiskusi extends Model
{
    use HasFactory;

    protected $table = "sub_diskusi";

    protected $guarded = ['id'];

    public function sub_diskusi(){
        return $this->belongsTo(Diskusi::class);
    }

    public function guru()
    {
        return $this->belongsTo(GuruModel::class);
    }

    public function siswa(){
        return $this->belongsTo(SiswaModel::class);
    }
    
}
