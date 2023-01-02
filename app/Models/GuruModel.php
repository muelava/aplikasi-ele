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
        return $this->belongsTo(Diskusi::class);
    }
}
