<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DateTime;

class TagihanResource extends JsonResource
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
        
        $keuntungan = (!empty($this->keuntungan) ? $this->rupiah($this->keuntungan) : null);
        $persen_keuntungan = (!empty($this->persen_keuntungan) ? $this->persen_keuntungan . ' %' : null);
        $tgl_bayar = new DateTime($this->tgl_bayar);
        $tgl_transfer = new DateTime($this->tgl_transfer);
        $jumlah_hari = $tgl_transfer->diff($tgl_bayar);
        $btn_show = '<a href="' . route('tagihan.show', $this->id ) . '" class="btn btn-info btn-sm btn-show" title="'. $this->uraian .'"><i class="fa fa-info"></i></a>';

        return [
            'id'                => $this->id,
            'uraian'            => $this->uraian,
            'no_suratpk'        => $this->no_suratpk,
            'keuntungan'        => $keuntungan,
            'persen_keuntungan' => $persen_keuntungan,
            'jumlah_hari'       => $jumlah_hari->days . ' hari',
            'show'              => $btn_show
        ];
    }

}
