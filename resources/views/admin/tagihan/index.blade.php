@extends('admin.layouts.header')

@section('title')
    Keuangan
@endsection

@push('style')
    
@endpush

@section('content')
    <section class="content-header">
        <h1><b>Admin</b> Manage Keuangan</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="fa fa-user"></i> Keuangan
                </a>
            </li>
            <li class="active">
                <a href="javascript:void(0);">
                    <i class="fa fa-user"></i> Tagihan
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Data Rekapan Tagihan</h3>
                        <div class="box-tools pull-right"><a href="{{ route('admin.tagihan.create') }}" class="btn btn-success btn-sm modal-show" title="Tambah Data"><span>Tambah </span> <i class="fa fa-plus-circle"></i></a></div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="tagihan-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Uraian</th>
                                        <th>No. Surat Perintah Kerja</th>
                                        <th>Keuntungan (Rp. )</th>
                                        <th>Keuntungan (%)</th>
                                        <th>Jumlah Hari</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $('#tagihan-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('admin.tagihan.table') }}",
            columns: [
                { "data": 'DT_RowIndex', "width": "10px"},
                { "data": 'uraian' },
                { "data": 'no_suratpk'},
                { "data": 'keuntungan' },
                { "data": 'persen_keuntungan' },
                { "data": 'jumlah_hari' },
                { "data": 'show' },
                { "data": 'edit'},
                { "data": 'delete'}
            ],
            rowCallback: function(row, data, index)
                {
                    if(data.keuntungan == null || data.keuntungan == 0 )
                    {
                        $(row).addClass('bg-yellow');
                    }
                }
        });

        
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush