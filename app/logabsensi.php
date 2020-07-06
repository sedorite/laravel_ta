<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logabsensi extends Model
{
    protected $table = "absensis";
    protected $primaryKey = "id_absen";
    protected $fillable = ["tgl","waktu","keterangan","nik"];
}
