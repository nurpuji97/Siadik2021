<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Waktu
 * 
 * kelas ini untuk pendeklarasikan model Waktu laravel 8
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */


class Waktu extends Model
{
    use HasFactory;

    protected $table = "waktus";

    protected $fillable = ["jam", "jp"];
}
