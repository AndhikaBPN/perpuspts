<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mdetpinjam;
use Illuminate\Support\Facades\Validator;

class cdetpinjam extends Controller
{
    public function indetail(Request $req){
        $validator=Validator::make($req->all(), [
            'id_transpinjam' => 'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $save=mdetpinjam::create([
            'id_transpinjam' => $req->id_transpinjam
        ]);
        if ($save) {
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    public function getCustomer(){
        $data=mdetpinjam::join('transaksi_pinjam', 'transaksi_pinjam.id_transpinjam', '=', 'detail_pinjam.id_detail')
                          ->join('buku', 'buku.id_buku', '=', 'transaksi_pinjam.id_transpinjam') 
                          ->join('kategori', 'kategori.id_kategori', '=', 'buku.id_buku')
                          ->join('peminjam', 'peminjam.id_peminjam', '=', 'transaksi_pinjam.id_peminjam')
                          ->select('detail_pinjam.id_detail', 
                                   'transaksi_pinjam.id_peminjam', 
                                   'transaksi_pinjam.id_buku',
                                   'peminjam.nama',
                                   'peminjam.alamat', 
                                   'buku.judul' ,
                                   'kategori.kategori',
                                   'transaksi_pinjam.tgl_pinjam', 
                                   'transaksi_pinjam.tgl_jatuh_tempo')
                          ->get();
        return Response()->json(['data'=>$data]);
    }
}
