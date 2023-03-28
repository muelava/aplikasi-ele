<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = "mata_pelajaran";

    protected $guarded = ['id'];

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    public function diskusi()
    {
        return $this->hasMany(Diskusi::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
