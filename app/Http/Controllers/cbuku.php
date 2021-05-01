<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mbuku;
use Illuminate\Support\Facades\Validator;

class cbuku extends Controller
{
    public function inbuku(Request $req){
        $validator=Validator::make($req->all(), [
            'judul'        => 'required',
            'pengarang'    => 'required',
            'id_kategori'  => 'required'
        ]);
        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }
        $save=mbuku::create([
            'judul'        => $req->judul,
            'pengarang'    => $req->pengarang,
            'id_kategori'  => $req->id_kategori
        ]);
        if ($save) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    public function update(Request $req, $id){
        $validator=Validator::make($req->all(), [
            'judul'          => 'required',
            'pengarang'      => 'required',
            'id_kategori'    => 'required'
        ]);
        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }
        $ubah=mbuku::where('id_buku', $id)->update([
            'judul'         => $req->judul,
            'pengarang'     => $req->pengarang,
            'id_kategori'   => $req->id_kategori
        ]);
        if ($ubah) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    
    public function destroy($id){
        $hapus=mbuku::where('id_buku', $id)->delete();
        if ($hapus) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
