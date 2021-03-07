<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Ruangan
 * 
 * kelas ini untuk pendeklarasikan model Ruangan laravel 8
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */

class Ruangan extends Model
{
    use HasFactory;

    protected $table = "ruangan";

    protected $fillable = ["kode_ruangan", "nama_ruangan"];
}
