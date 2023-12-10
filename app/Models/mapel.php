<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama_mapel','keterangann','is_active','tingkat_sekolah_id'];

    public function tingkat_sekolah(){
        return $this->belongsTo(tingkat_sekolah::class);
    }
    public function materi(){
        return $this->hasMany(materi::class);
    }
}
