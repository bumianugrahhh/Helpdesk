@extends('layouts.template')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    @if(session()->has('error'))
        <div class="alert alert-danger fade show">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
                {{ Session::get('error') }}
        </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success fade show">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
                {{ Session::get('success') }}
        </div>
    @endif
   
</div>
<div class="jumbotron jumbotron-fluid bg-dark my-2 mx-4">

    <div class="jumbotron-background">
        <img src="{{asset('public/asset/img/wave.svg')}}">
    </div>

    <div class="container text-white">

        <h1 class="display-4">Selamat datang, {{Auth()->user()->username}}</h1>
        <p class="lead">Selamat datang di Technos's Helpdesk System, silahkan adukan permasalahan TI anda kepada kami.</p>
        <hr class="my-4">
        <p>Klik tombol tambah pengaduan berikut untuk mengirimkan data pengaduan terkait permasalahan yang terjadi.</p>
        <button type="button" data-toggle="modal" data-target="#tambah-data" class="btn btn-primary btn-lg" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Pengaduan</button>

    </div>
    <!-- /.container -->

</div>
<!-- /.jumbotron -->
<div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h5 class="modal-title text-primary"><i class="fas fa-plus"></i> Tambah Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('pengaduan.store')}}" id="formTambahData" method="post" accept-charset="utf-8">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="judul_pengaduan">Judul Pengaduan</label>
                    <input type="text" name="judul_pengaduan" class="form-control" id="judul_pengaduan" required="" placeholder="Masukkan judul pengaduan" value="">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="isi_pengaduan">Isi Pengaduan</label>
                    <textarea name="isi_pengaduan" class="form-control" id="isi_pengaduan" cols="30" rows="4" required="" placeholder="Masukkan uraian yang diadukan"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Yakin</button>
                </div>
            </div>
            </form>        
		</div>
    </div>
</div>
@endsection
