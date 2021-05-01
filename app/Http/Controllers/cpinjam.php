<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mpinjam;
use Illuminate\Support\Facades\Validator;

class cpinjam extends Controller
{
    public function inpinjam(Request $req){
        $validator=Validator::make($req->all(), [
            'nama'  => 'required',
            'alamat'=> 'required'
        ]);
        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }
        $save=mpinjam::create([
            'nama'  => $req->nama,
            'alamat'=> $req->alamat
        ]);
        if ($save) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    public function update(Request $req, $id){
        $validator=Validator::make($req->all(), [
            'nama'  => 'required',
            'alamat'=> 'required'
        ]);
        if ($validator->fails()) {
            return Response()->json($validator-errors());
        }
        $ubah=mpinjam::where('id_peminjam', $id)->update([
            'nama'  => $req->nama,
            'alamat'=> $req->alamat
        ]);
        if ($ubah) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    public function destroy($id){
        $hapus=mpinjam::where('id_peminjam', $id)->delete();
        if ($hapus) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
