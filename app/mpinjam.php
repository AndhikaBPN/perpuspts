<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mpinjam extends Model
{
    protected $table="peminjam";
    protected $primaryKey="id_peminjam";
    public $timestamps=false;
    protected $fillable=[
        'nama', 'alamat'
    ];
}
