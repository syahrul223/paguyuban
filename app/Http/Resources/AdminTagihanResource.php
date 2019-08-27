<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DateTime;

class AdminTagihanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
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
        
        $keuntungan = (!empty($this->keuntungan) ? $this->rupiah($this->keuntungan) : 0);
        $persen_keuntungan = (!empty($this->persen_keuntungan) ? $this->persen_keuntungan . ' %' : 0 . ' %');
        $tgl_bayar = new DateTime($this->tgl_bayar);
        $tgl_transfer = new DateTime($this->tgl_transfer);
        $jumlah_hari = $tgl_transfer->diff($tgl_bayar);
        $btn_show = '<a href="'. route('admin.tagihan.show', $this->id ) . '" class="btn btn-info btn-sm btn-show" title="'. $this->uraian .'"><i class="fa fa-info-circle"></i></a>';
        $btn_edit = '<a href="'. route('admin.tagihan.edit', $this->id ) . '" class="btn btn-warning btn-sm modal-show edit" title="Ubah '. $this->uraian .'"><i class="fa fa-pencil"></i></a>';
        $btn_delete = '<a href="'. route('admin.tagihan.destroy', $this->id ) . '" class="btn btn-danger btn-sm btn-delete" title="'. $this->uraian .'"><i class="fa fa-trash"></i></a>';

        return [
            'id'                => $this->id,
            'uraian'            => $this->uraian,
            'no_suratpk'        => $this->no_suratpk,
            'keuntungan'        => $keuntungan,
            'persen_keuntungan' => $persen_keuntungan,
            'jumlah_hari'       => $jumlah_hari->days . ' hari',
            'show'              => $btn_show,
            'edit'              => $btn_edit,
            'delete'            => $btn_delete
        ];
    }
}
