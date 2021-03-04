<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kejuruan extends Model
{
    use HasFactory;

    protected $table = 'kejuruans';

    protected $fillable = ["kode_kejuruan", "nama_kejuruan"];
}
