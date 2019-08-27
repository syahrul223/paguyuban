<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DateTime;   

class DetailTagihanResource extends JsonResource
{
    public function rupiah($int)
    {
        $result = "Rp ". number_format($int,2,',','.');
        return $result;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $nilai_tagihan = (!empty($this->nilai_tagihan) ? $this->rupiah($this->nilai_tagihan) : null);
        $modal_paguyuban = (!empty($this->modal_paguyuban) ? $this->rupiah($this->modal_paguyuban) : null);
        $modal_pihaklain = (!empty($this->modal_pihaklain) ? $this->rupiah($this->modal_pihaklain) : null);
        $transfer = (!empty($this->transfer) ? $this->rupiah($this->transfer) : null);
        $tgl_bayar = new DateTime($this->tgl_bayar);
        $tgl_transfer = new DateTime($this->tgl_transfer);

        return 
        [
            'uraian'            => $this->uraian,
            'nilai_tagihan'     => $nilai_tagihan,
            'modal_paguyuban'   => $modal_paguyuban,
            'modal_pihaklain'   => $modal_pihaklain,
            'transfer'          => $transfer,
            'tgl_bayar'         => $tgl_bayar->format('d/M/Y'),
            'tgl_transfer'      => $tgl_transfer->format('d/M/Y'),
            'keterangan'        => $this->keterangan
        ];
    }
}
