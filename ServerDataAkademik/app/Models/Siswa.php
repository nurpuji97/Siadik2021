<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswas";

    protected $fillable = ["name", "user_id", "agama", "alamat", "avatar", "nohp"];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
