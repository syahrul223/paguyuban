<div class="table-responsive">
    <table class="table table-borderless">
        <tbody>
            <tr>
                <th>Nilai Tagihan</th>
                <td>:</td>
                <td>{{ $model['nilai_tagihan'] }}</td>
            </tr>
            <tr>
                <th>Modal Paguyuban</th>
                <td>:</td>
                <td>{{ $model['modal_paguyuban'] }}</td>
            </tr>
            <tr>
                <th>Modal Pihak Lain</th>
                <td>:</td>
                <td>{{ $model['modal_pihaklain'] }}</td>
            </tr>
            <tr>
                <th>Nilai Transfer</th>
                <td>:</td>
                <td>{{ $model['transfer'] }}</td>
            </tr>
            <tr>
                <th>Tanggal Bayar</th>
                <td>:</td>
                <td>{{ $model['tgl_bayar'] }}</td>
            </tr>
            <tr>
                <th>Tanggal Transfer</th>
                <td>:</td>
                <td>{{ $model['tgl_transfer'] }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>:</td>
                <td>{{ $model['keterangan'] }}</td>
            </tr>
        </tbody>
    </table>
</div>