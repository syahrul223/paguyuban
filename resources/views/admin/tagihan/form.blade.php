{!! Form::model($model, [
    'route' => $model->exists ? ['admin.update.tagihan', $model->id] :'admin.tagihan.store',
    'method' => 'POST'
]) !!}

    <div class="form-group">
        <label for="uraian" class="control-label"> Uraian </label>
        {!! Form::text('uraian', null, [ 'class' => 'form-control', 'id' => 'uraian', 'required' ]) !!}
    </div>

    <div class="form-group">
        <label for="no_suratpk" class="control-label">Nomor Surat Perintah Kerja</label>
        {!! Form::text('no_suratpk', null, ['class' => 'form-control', 'id' => 'no_suratpk' ]) !!}
    </div>
    
    <div class="form-group">
        <label for="nilai_tagihan" class="control-label">Nilai Tagihan</label>
        {!! Form::number('nilai_tagihan', null, ['class' => 'form-control', 'id' => 'nilai_tagihan', 'placeholder' => 'e.g 100000']) !!}
    </div>

    <div class="form-group">
        <label for="modal_paguyuban" class="control-label">Modal Paguyuban</label>
        {!! Form::number('modal_paguyuban', null, ['class' => 'form-control' , 'id' => 'modal_paguyuban', 'placeholder' => 'e.g 100000']) !!}
    </div>

    <div class="form-group">
        <label for="modal_pihaklain" class="control-label">Modal Pihak Lain</label>
        {!! Form::number('modal_pihaklain', null, ['class' => 'form-control', 'id' => 'modal_pihaklain', 'placeholder' => 'e.g 100000']) !!}
    </div>

    <div class="form-group">
        <label for="tgl_bayar" class="control-label">Tanggal Bayar</label>
        {!! Form::date('tgl_bayar', null, ['class' => 'form-control', 'id' => 'tgl_bayar']) !!}
    </div>

    <div class="form-group">
        <label for="transfer" class="control-label">Nilai Transfer</label>
        {!! Form::number('transfer', null, ['class' => 'form-control', 'id' => 'transfer', 'placeholder' => 'e.g 100000']) !!}
    </div>

    <div class="form-group">
        <label for="tgl_transfer" class="control-label">Tanggal Transfer</label>
        {!! Form::date('tgl_transfer', null, ['class' => 'form-control', 'id' => 'tgl_transfer']) !!}
    </div>

    <div class="form-group">
        <label for="keterangan" class="control-label">Keterangan</label>
        {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'id' => 'keterangan']) !!}
    </div>

{!! Form::close() !!}