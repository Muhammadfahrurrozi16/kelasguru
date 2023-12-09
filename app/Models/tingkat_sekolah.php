<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tingkat_sekolah extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama'];

    public function mapel(){
        return $this->hasMany(mapel::class);
    }
}
