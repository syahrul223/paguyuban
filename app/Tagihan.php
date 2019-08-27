<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 't_tagihan';

    protected $fillable = [
        'uraian', 
        'no_suratpk', 
        'nilai_tagihan', 
        'modal_paguyuban',
        'modal_pihaklain',
        'tgl_bayar',
        'transfer', 
        'tgl_transfer',
        'keuntungan',
        'persen_keuntungan',
        'keterangan',
    ];

    
}
