<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mtranspinjam;
use Illuminate\Support\Facades\Validator;

class ctranspinjam extends Controller
{
    public function inpinjam(Request $req){
        $validator=Validator::make($req->all(), [
            'id_peminjam'       => 'required',
            'id_buku'           => 'required',
        ]);
        if ($validator->fails()){
            return Response()->json($validator->errors());
        }
        $save=mtranspinjam::create([
            'id_peminjam'       => $req->id_peminjam,
            'id_buku'           => $req->id_buku,
            'tgl_pinjam'        => date("Y-m-d"),
            'tgl_jatuh_tempo'   => date('Y-m-d', strtotime('+7 days', strtotime(date("Y-m-d"))))
        ]);
        if ($save) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    public function update(Request $req, $id){
        $validator=Validator::make($req->all(), [
            'id_peminjam'       => 'required',
            'id_buku'           => 'required'
        ]);
        if ($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=mtranspinjam::where('id_transpinjam', $id)->update([
            'id_peminjam'       => $req->id_peminjam,
            'id_buku'           => $req->id_buku
        ]);
        if ($ubah) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    public function destroy($id){
        $hapus=mtranspinjam::where('id_transpinjam', $id)->delete();
        if ($hapus) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}