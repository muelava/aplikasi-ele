<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $guarded = ['id'];

    public function diskusi()
    {
        return $this->hasMany(Diskusi::class);
    }

    public function sub_diskusi()
    {
        return $this->hasMany(SubDiskusi::class);
    }
}
