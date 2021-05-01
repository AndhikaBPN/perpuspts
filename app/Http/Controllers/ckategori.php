<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mkategori;
use Illuminate\Support\Facades\Validator;

class ckategori extends Controller
{
    public function inkategori(Request $req){
        $validator=Validator::make($req->all(), [
            'kategori'      => 'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $save=mkategori::create([
            'kategori'      => $req->kategori
        ]);
        if ($save) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
        
    }

    public function update(Request $req, $id){
        $validator=Validator::make($req->all(), [
            'kategori'      => 'required'
        ]);
        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }
        $ubah=mkategori::where('id_kategori', $id)->update([
            'kategori'      => $req->kategori
        ]);
        if ($ubah) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    public function destroy($id){
        $hapus=mkategori::where('id_kategori', $id)->delete();
        if ($hapus) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
