<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AdminTagihanResource;
use App\Http\Resources\AdminTagihanCollection;
use App\Http\Resources\DetailTagihanResource;
use App\Tagihan;
use DataTables;

class AdminTagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tagihan.index');
    }

    public function keuntungan($arg1 , $arg2)
    {
        $res = $arg1 - $arg2;
        return $res;
    }

    public function persen_keuntungan($arg1, $arg2)
    {
        $res = ($arg1 / $arg2) * 100;
        return $res;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Tagihan();
        return view('admin.tagihan.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'uraian'        => 'required',
            'tgl_bayar'     => 'required'
        ]);
        $uraian             = $request->uraian;
        $no_suratpk         = $request->no_suratpk;
        $nilai_tagihan      = $request->nilai_tagihan;
        $modal_paguyuban    = $request->modal_paguyuban;
        $modal_pihaklain    = $request->modal_pihaklain;
        $tgl_bayar          = $request->tgl_bayar;
        $transfer           = $request->transfer;
        $tgl_transfer       = $request->tgl_transfer;
        $keterangan         = $request->keterangan;
        if(!empty($tgl_transfer))
        {
            $keuntungan         = ( 
                empty($modal_paguyuban) && empty($modal_pihaklain) ? $this->keuntungan($transfer, 0) :
                (empty($modal_paguyuban) ? $this->keuntungan($transfer, $modal_pihaklain) : $this->keuntungan($transfer, $modal_paguyuban))
            );
            $persen_keuntungan  = ( 
                empty($modal_paguyuban) && empty($modal_pihaklain) ? 100 : 
                (empty($modal_paguyuban) ? $this->persen_keuntungan($keuntungan, $modal_pihaklain) : $this->persen_keuntungan($keuntungan, $modal_paguyuban))
            );
            try{
                $tagihan = Tagihan::create([
                    'uraian'            => $uraian,
                    'no_suratpk'        => $no_suratpk,
                    'nilai_tagihan'     => $nilai_tagihan,
                    'modal_paguyuban'   => $modal_paguyuban,
                    'modal_pihaklain'   => $modal_pihaklain,
                    'tgl_bayar'         => $tgl_bayar,
                    'transfer'          => $transfer,
                    'tgl_transfer'      => $tgl_transfer,
                    'keuntungan'        => $keuntungan,
                    'persen_keuntungan' => number_format((float)$persen_keuntungan, 2),
                    'keterangan'        => $keterangan
                ]);
    
                return new AdminTagihanResource($tagihan);
    
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        try {
            $tagihan = Tagihan::create([
                'uraian'            => $uraian,
                'no_suratpk'        => $no_suratpk,
                'nilai_tagihan'     => $nilai_tagihan,
                'modal_paguyuban'   => $modal_paguyuban,
                'modal_pihaklain'   => $modal_pihaklain,
                'tgl_bayar'         => $tgl_bayar,
                'keterangan'        => $keterangan
            ]);

            return new AdminTagihanResource($tagihan);

        } 
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Tagihan::find($id);
        $tagihan = new DetailTagihanResource($model);
        return view('admin.layouts.show_tagihan', [ 'model' => $tagihan->toArray($model) ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Tagihan::findOrFail($id);
        return view('admin.tagihan.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'uraian'        => 'required',
        //     'tgl_bayar'     => 'required'
        // ]);
        // $tagihan = Tagihan::findOrFail($id);
        // $uraian             = $request->uraian;
        // $no_suratpk         = $request->no_suratpk;
        // $nilai_tagihan      = $request->nilai_tagihan;
        // $modal_paguyuban    = $request->modal_paguyuban;
        // $modal_pihaklain    = $request->modal_pihaklain;
        // $tgl_bayar          = $request->tgl_bayar;
        // $transfer           = $request->transfer;
        // $tgl_transfer       = $request->tgl_transfer;
        // $keterangan         = $request->keterangan;
        
        // if(!empty($tgl_transfer))
        // {
        //     $keuntungan         = ( 
        //         empty($modal_paguyuban) && empty($modal_pihaklain) ? $this->keuntungan($transfer, 0) :
        //         (empty($modal_paguyuban) ? $this->keuntungan($transfer, $modal_pihaklain) : $this->keuntungan($transfer, $modal_paguyuban))
        //     );
        //     $persen_keuntungan  = ( 
        //         empty($modal_paguyuban) && empty($modal_pihaklain) ? 100 : 
        //         (empty($modal_paguyuban) ? $this->persen_keuntungan($keuntungan, $modal_pihaklain) : $this->persen_keuntungan($keuntungan, $modal_paguyuban))
        //     );
        //     try {
        //         $tagihan->update([
        //             'uraian'            => $uraian,
        //             'no_suratpk'        => $no_suratpk,
        //             'nilai_tagihan'     => $nilai_tagihan,
        //             'modal_paguyuban'   => $modal_paguyuban,
        //             'modal_pihaklain'   => $modal_pihaklain,
        //             'tgl_bayar'         => $tgl_bayar,
        //             'transfer'          => $transfer,
        //             'tgl_transfer'      => $tgl_transfer,
        //             'keuntungan'        => $keuntungan,
        //             'persen_keuntungan' => number_format((float)$persen_keuntungan, 2),
        //             'keterangan'        => $keterangan
        //         ]);

        //         return new AdminTagihanResource($tagihan);
        //     } 
        //     catch (Exception $e) {
        //         return $e->getMessage();
        //     }
        // }
        // try {
        //     $tagihan->update([
        //         'uraian'            => $uraian,
        //         'no_suratpk'        => $no_suratpk,
        //         'nilai_tagihan'     => $nilai_tagihan,
        //         'modal_paguyuban'   => $modal_paguyuban,
        //         'modal_pihaklain'   => $modal_pihaklain,
        //         'tgl_bayar'         => $tgl_bayar,
        //         'keterangan'        => $keterangan
        //     ]);

        //     return new AdminTagihanResource($tagihan);
        // } 
        // catch (Exception $e) {
        //    return $e->getMessage();
        // }
    }

    public function updateTagihan(Request $request, $id)
    {
        $request->validate([
            'uraian'        => 'required',
            'tgl_bayar'     => 'required'
        ]);
        $tagihan = Tagihan::findOrFail($id);
        $uraian             = $request->uraian;
        $no_suratpk         = $request->no_suratpk;
        $nilai_tagihan      = $request->nilai_tagihan;
        $modal_paguyuban    = $request->modal_paguyuban;
        $modal_pihaklain    = $request->modal_pihaklain;
        $tgl_bayar          = $request->tgl_bayar;
        $transfer           = $request->transfer;
        $tgl_transfer       = $request->tgl_transfer;
        $keterangan         = $request->keterangan;
        
        if(!empty($tgl_transfer))
        {
            $keuntungan         = ( 
                empty($modal_paguyuban) && empty($modal_pihaklain) ? $this->keuntungan($transfer, 0) :
                (empty($modal_paguyuban) ? $this->keuntungan($transfer, $modal_pihaklain) : $this->keuntungan($transfer, $modal_paguyuban))
            );
            $persen_keuntungan  = ( 
                empty($modal_paguyuban) && empty($modal_pihaklain) ? 100 : 
                (empty($modal_paguyuban) ? $this->persen_keuntungan($keuntungan, $modal_pihaklain) : $this->persen_keuntungan($keuntungan, $modal_paguyuban))
            );
            try {
                $tagihan->update([
                    'uraian'            => $uraian,
                    'no_suratpk'        => $no_suratpk,
                    'nilai_tagihan'     => $nilai_tagihan,
                    'modal_paguyuban'   => $modal_paguyuban,
                    'modal_pihaklain'   => $modal_pihaklain,
                    'tgl_bayar'         => $tgl_bayar,
                    'transfer'          => $transfer,
                    'tgl_transfer'      => $tgl_transfer,
                    'keuntungan'        => $keuntungan,
                    'persen_keuntungan' => number_format((float)$persen_keuntungan, 2),
                    'keterangan'        => $keterangan
                ]);

                return new AdminTagihanResource($tagihan);
            } 
            catch (Exception $e) {
                return $e->getMessage();
            }
        }
        try {
            $tagihan->update([
                'uraian'            => $uraian,
                'no_suratpk'        => $no_suratpk,
                'nilai_tagihan'     => $nilai_tagihan,
                'modal_paguyuban'   => $modal_paguyuban,
                'modal_pihaklain'   => $modal_pihaklain,
                'tgl_bayar'         => $tgl_bayar,
                'keterangan'        => $keterangan
            ]);

            return new AdminTagihanResource($tagihan);
        } 
        catch (Exception $e) {
           return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->delete();
    }

    public function tagihanTable()
    {
        $model = Tagihan::all();

        $tagihan = AdminTagihanResource::collection($model);

        return DataTables::of($tagihan)->addIndexColumn()->rawColumns(['show', 'edit', 'delete'])->make(true);
    }
}
