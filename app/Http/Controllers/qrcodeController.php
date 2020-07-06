<?php

namespace App\Http\Controllers;

use App\qrcode;
use App\logabsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class qrcodeController extends Controller
{
    Public function index(){
        // $random = Str::random(8);
        $data = logabsensi::all();

        // qrcode::create([
        //     "qrcode"=>$random
        // ]);
        $qrstring = qrcode::all()->first();
        
        return view('qrcode/index',compact('data','qrstring'));

        
    }

    public function ceksttqr(){
        $qr = qrcode::All()->first();

        return $qr;
    }

    public function updatesttqr(Request $req){
        $qr = qrcode::where("id", $req->id)->update([
            "qrcode"=>$req->qr,
            "status"=> 0
        ]);
    }
}
