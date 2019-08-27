@extends('admin.layouts.header')

@section('title')
    Admin Home
@endsection

@section('content')
    <section class="content-header">
        <h1><b>Admin</b> Dashboard <small>v.1.0</small> </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="javascript:void(0);">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Manage Anggota</h4>
                    </div>
                    <div class="box-body justify-content-center">
                        
                    </div>
                    <div class="box-footer text-center">
                        <a href="{{ route('admin.manage.user') }}" class="btn bg-navy btn-flat"><span>Lebih Lanjut </span> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-solid box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Laporan Keuangan</h4>
                    </div>
                    <div class="box-body">
                        
                    </div>
                    <div class="box-footer text-center">
                        <a href="{{ route('admin.tagihan.index') }}" class="btn bg-navy btn-flat"><span>Lebih Lanjut </span> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>00</h3>
                        <p>Keanggotaan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="javascript:void(0);" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>00%</h3>
                        <p>Keuntungan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="javascript:void(0);" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>00</h3>
                        <p>Keuangan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="javascript:void(0);" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>00</h3>
                        <p>Pekerjaan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-outlet"></i>
                    </div>
                    <a href="javascript:void(0);" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <div class="box-title">Upload File Visi Misi</div>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('upload.visimisi') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="file">Piih File untuk di upload</label>
                                <input type="file" name="pdf" id=""><br>
                                <button class="btn btn-md bg-primary" type="submit">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
@endsection

