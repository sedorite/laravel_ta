<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    //
    protected $primaryKey = "id_kar";
    protected $fillable = ["nik","nama","telp","email","tgl","foto","username","password"];
}
