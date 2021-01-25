<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = "pegawai";

    protected $fillable = ["name", "user_id", "agama", "jenis_kelamin", "alamat", "avatar", "nohp"];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/baseline_person_black_48dp.png');
        }
        return asset('images/' . $this->avatar);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
