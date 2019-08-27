<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagihanResource;
use App\Http\Resources\DetailTagihanResource;
use App\Http\Resources\TagihanResourceCollection;
use Illuminate\Http\Request;
use App\Tagihan;
use DataTables;


class TagihanController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():TagihanResourceCollection
    {
        return new TagihanResourceCollection(Tagihan::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request):TagihanResource
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

            return $tagihan;
        }
        
            $tagihan = Tagihan::create([
                'uraian'            => $uraian,
                'no_suratpk'        => $no_suratpk,
                'nilai_tagihan'     => $nilai_tagihan,
                'modal_paguyuban'   => $modal_paguyuban,
                'modal_pihaklain'   => $modal_pihaklain,
                'tgl_bayar'         => $tgl_bayar,
                'keterangan'        => $keterangan
            ]);

            $tagihan;

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param Person $person
     * @return PersonResource
     */
    public function show($id)
    {
        $tagihan = Tagihan::find($id);

        $model = new DetailTagihanResource($tagihan);

        return view('layouts.show_tagihan', [
            'model' => $model->toArray($tagihan),
        ]);

        // return new DetailTagihanResource($tagihan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tagihan $tagihan, Request $request): TagihanResource
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

                return new TagihanResource($tagihan);
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

            return new TagihanResource($tagihan);
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
    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();

        return response()->json();
    }

    public function tableTagihan()
    {
        $model = Tagihan::all();

        $resource = TagihanResource::collection($model);

        return DataTables::of($resource)
            ->addIndexColumn()->rawColumns(['show'])->make(true);
    }

    public function userView()
    {
        return view('tagihan');
    }

    // public function test()
    // {
    //     $int1 = 0;
    //     $int2 = 0;

    //     return dd(empty($int1));
    // }

}
