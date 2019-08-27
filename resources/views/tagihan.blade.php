@extends('layouts.header')

@section('title')
    Laporan Keuangan
@endsection

@push('style')
    <style>
        th{
            font-size: 10px;
        }
        td{
            font-size: 9px;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-warning text-center">Rekapan Tagihan CV Karya Mandiri</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tagihan" class="table table-bordered responsive" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Uraian</th>
                                        <th>No. Surat Perintah Kerja</th>
                                        <th>Keuntungan (Rp. )</th>
                                        <th>Keuntungan (%)</th>
                                        <th>Jumlah Hari</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function(){
                $('#tagihan').DataTable({
                "processing" : true,
                "serverSide" : true,
                responsive : true,
                "ajax" : "{{ route('user.tagihan.table') }}",
                "columns" : [
                    { "data": 'DT_RowIndex', "width": "10px"},
                    { "data": 'uraian' },
                    { "data": 'no_suratpk'},
                    { "data": 'keuntungan' },
                    { "data": 'persen_keuntungan' },
                    { "data": 'jumlah_hari' },
                    { "data": 'show' }
                ],

                rowCallback: function(row, data, index)
                {
                    if(data.keuntungan == null || data.keuntungan == 0 )
                    {
                        $(row).addClass('bg-warning');
                    }
                }
            });
        })
    </script>
@endpush