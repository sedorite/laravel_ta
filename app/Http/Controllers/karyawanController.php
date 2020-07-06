<?php

namespace App\Http\Controllers;

use App\karyawan;
use Illuminate\Http\Request;

class karyawanController extends Controller
{
    function add($id=""){
        if($id==""){
            $rsKar="";
        }else{
            $rsKar = karyawan::where("id_kar",$id)->first();
        }

        return view("karyawan/add",compact("rsKar","id"));
    }

    function index(){
        $data = karyawan::All();
        return view('karyawan/data',compact('data'));
    }

    function save(Request $req,$id=""){
        
        if($req->file('foto')){
            $file = $req->file('foto');
            $nama_foto = date("Y-m-d").$file->getClientOriginalName();
        }else{
            $nama_foto = $req->old_foto;
        }

        if($id==""){
            karyawan::create([
                "nik"=>$req->nik,
                "nama"=>$req->nama,
                "telp"=>$req->telp,
                "email"=>$req->email,
                "tgl"=>$req->tgl,
                "foto"=>$nama_foto,
                "username"=>$req->username,
                "password"=>$req->password
            ]);
        }else{
            karyawan::where("id_kar",$id)->update([
                "nik"=>$req->nik,
                "nama"=>$req->nama,
                "telp"=>$req->telp,
                "email"=>$req->email,
                "tgl"=>$req->tgl,
                "foto"=>$nama_foto,
                "username"=>$req->username,
                "password"=>$req->password
            ]);
        }
        
        if($req->file('foto')){
            $file->move(public_path()."/uploads", $nama_foto);
        }

        return redirect(url("datakaryawan"))->with("status","Data Berhasil di Simpan!");
    }

    public function delete($id){
        karyawan::where("id_kar",$id)->delete();
        return redirect(url("datakaryawan"))->with("status","Data Berhasil Di Hapus!");
    }
}
