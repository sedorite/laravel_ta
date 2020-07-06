<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qrcode extends Model
{
    protected $table = "qrcodes";
    protected $fillable = ["qrcode"];
    public $timestamps = false;
}
