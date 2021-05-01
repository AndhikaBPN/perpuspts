<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mkategori extends Model
{
    protected $table="kategori";
    protected $primaryKey="id_kategori";
    public $timestamps=false;
    protected $fillable=[
        'id_kategori', 'kategori'
    ];
}
