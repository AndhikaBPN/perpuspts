<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mbuku extends Model
{
    protected $table="buku";
    protected $primaryKey="id_buku";
    public $timestamps=false;
    protected $fillable=[
        'judul', 'pengarang', 'id_kategori'
    ];
}
