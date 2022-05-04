@extends('layouts.template')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<div class="row mt-4">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">

            <h3 class="h3 text-gray-900"><i class="fa fa-fw fa-print"></i> Cetak Laporan Pengaduan</h3>

            <div class="card shadow-sm my-3">
                <div class="card-body border-left-info rounded-sm text-justify">
                    <i class="fa fa-fw fa-info-circle fa-lg"></i> <strong> Silahkan pilih range tanggal untuk menemukan list data pengaduan yang ingin di cetak sebagai laporan.</strong>
                </div>
            </div>

        </div>
        <!-- .col -->
    </div>
    <!-- .row -->

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form action="{{route('laporan.cetak')}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="tgl_mulai">Dari Tanggal:</label>
                            <input type="date" name="tgl_mulai" class="form-control shadow-sm border-left-warning" id="tgl_mulai" required>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="tgl_selesai">Sampai Tanggal: </label>
                            <input type="date" name="tgl_selesai" class="form-control shadow-sm border-left-warning" id="tgl_selesai" required>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="filter">Filter instansi <sup class="text-info">Opsional</sup></label>
                            <select name="filter" class="form-control shadow-sm border-left-warning" id="filter">
                                <option value="">-- Pilih Semua --</option>
                                @foreach($instansi as $r)
                                <option value="{{$r->id_instansi}}">{{$r->nama_instansi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <button type="submit" name="action" id="btn-cek" value="cek" class="btn btn-primary shadow-sm btn-cek float-left" style="margin-top: 2rem;">Cek</button>

                        <button type="submit" name="action" value="pdf" class="btn btn-outline-danger shadow-sm ml-3" style="margin-top: 2rem;">PDF <i class="fa fa-file-pdf"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if(!empty($cek))
<div class="result">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card shadow-sm my-3">
<div class="card-body">
<div class="row my-1">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="1%" class="text-nowrap">No.</th>
                                <th width="1%" class="text-nowrap">Tanggal</th>
                                <th width="1%" class="text-nowrap">Judul</th>
                                <th class="text-nowrap">Isi Pengaduan</th>
                                <th class="text-nowrap">Nama Instansi</th>
                                <th class="text-nowrap" width="1%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($laporan->isEmpty())
                            <tr>
                                <td colspan="6">Data tidak ditemukan</td>
                            </tr>
                            @else
                                <?php $no=1;?>
                                @foreach($laporan as $r)
                                <tr>
                                    <td class="text-nowrap"><?=$no++?></td>
                                    <td class="text-nowrap"><?=date('d-m-Y',strtotime($r->tgl_pengaduan))?></td>
                                    <td class="text-nowrap">{{$r->judul_pengaduan}}</td>
                                    <td>{{$r->isi_pengaduan}}</td>
                                    <td>{{$r->nama_instansi}}</td>
                                    <td class="text-nowrap">{{$r->status_pengaduan}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
@endif
@endsection
