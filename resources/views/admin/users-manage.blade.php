@extends('admin.layouts.header')

@section('title')
    Anggota
@endsection

@push('style')
    
@endpush

@section('content')
    <section class="content-header">
        <h1><b>Admin</b> Manage Anggota</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li class="active">
                <a href="javascript:void(0);">
                    <i class="fa fa-user"></i> Anggota
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Data Keanggotaan</h3>
                    </div>
                    <div class="box-body justify-content-center">
                        <div class="table-responsive">
                            <table id="user-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nama Pengguna</th>
                                        <th>Mendaftar</th>
                                        <th class="text-center">Detail</th>
                                        <th class="text-center">Ubah</th>
                                        <th class="text-center">Hapus</th>
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
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ url('api/user-data') }}",
            columns: [
                {data : 'DT_RowIndex', name: 'id'},
                {data : 'nama_lengkap', name: 'name'},
                {data : 'username', name: 'username'},
                {data : 'register_from', name: 'register_from'},
                {data : 'show', name: 'btn_show'},
                {data : 'edit', name: 'btn_edit'},
                {data : 'delete', name: 'btn_delete'}
            ]
        });
    </script>
@endpush