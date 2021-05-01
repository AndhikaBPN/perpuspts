<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mdetpinjam extends Model
{
    protected $table="detail_pinjam";
    protected $primaryKey="id_detail";
    public $timestamps=false;
    protected $fillable=[
        'id_transpinjam'
    ];
}
