<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Mapel
 * 
 * kelas ini untuk pendeklarasikan model Mapel laravel 8
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */

class Mapel extends Model
{
    use HasFactory;

    protected $table = "mapels";

    protected $fillable = ["kode_mapel", "nama_mapel"];
}
