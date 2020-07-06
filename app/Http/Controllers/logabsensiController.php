<?php

namespace App\Http\Controllers;

use App\logabsensi;
use App\karyawan;
use Illuminate\Http\Request;


class logabsensiController extends Controller
{
    function index(){
        
        $data = logabsensi::All();
        return view('absensi/log',compact("data"));
    }
}
