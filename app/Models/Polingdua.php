<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polingdua extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function feed()
    {
        return $this->belongsTo(Feed::class);
    }
    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
