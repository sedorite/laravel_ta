<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\karyawan;

class MobileController extends Controller
{
    function login(Request $req){
        $login = karyawan::where("email",$req->email)->first();

        if($login==null){
            $response = ["status"=>0,"mess"=>"Maaf User Tidak Ada!"];
        }else{
            if(Hash::check($req->password,$login->password)){
                $response = ["status"=>1,"mess"=>"","data"=>$login];
            }else{
                $response = ["status"=>0,"mess"=>"Maaf Password Anda Salah!"];
            }
        }

        return json_encode($response);
    }

    function updateProfile(Request $req){
        if(strpos($req->image,"base64")>0){
            if(file_exists(public_path()."/uploads/".$req->id.".jpeg")){
                unlink(public_path."/uploads/".$req->id.".jpeg");
            }
            $image = explode(",",$req->image);
            $type = str_replace(";base64","",str_replace("data:image/","",$image[0]));
            $file = base64_decode($image[1]);
            $foto = $req->id.".$type";
            Storage::disk('uploads')->put($foto, $file);
        }else{
            $foto = $req->id.".jpeg";
        }

        $save = karyawan::where('id_kar',$req->id)->update([
            "nama" => $req->name,
            "telp" => $req->telp,
            "jk" => $req->jk,
            "email" => $req->email,
            "foto" => $foto
        ]);

        $profile = karyawan::where("id_kar",$req->id)->first();
        $profile->foto = $profile->foto != "" ? asset("uploads/".$profile->foto) : "";

        if($save){
            return json_encode(["status"=>1,"mess"=>"Profile Update","data"=>$profile]);
        }else{
            return json_encode(["status"=>0,"mess"=>"Terjadi Kesalahan !"]);
        }
    }
}
