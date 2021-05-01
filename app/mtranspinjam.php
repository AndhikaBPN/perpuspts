<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mtranspinjam extends Model
{
    protected $table="transaksi_pinjam";
    protected $primaryKey="id_transpinjam";
    public $timestamps=false;
    protected $fillable=[
        'id_peminjam', 'id_buku', 'tgl_pinjam', 'tgl_jatuh_tempo'
    ];
}
