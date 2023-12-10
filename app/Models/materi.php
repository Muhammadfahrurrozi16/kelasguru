<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','mapel_id','sinopsis','materi','is_active'];

    public function mapel(){
        return $this->belongsTo(mapel::class);
    }
}
