<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Kejuruan
 * 
 * kelas ini untuk pendeklarasikan model Kejuran laravel 8
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */

class Kejuruan extends Model
{
    use HasFactory;

    protected $table = 'kejuruans';

    protected $fillable = ["kode_kejuruan", "nama_kejuruan"];
}
