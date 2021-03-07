<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Siswa
 * 
 * kelas ini untuk pendeklarasikan model Siswa, default Avatar dan Eloquitment Relationship table laravel 8
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */

class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswas";

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
