<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function poling()
    {
        return $this->hasMany(Poling::class);
    }
    
    public function polingdua()
    {
        return $this->hasMany(Polingdua::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
