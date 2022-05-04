@extends('layouts.template')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
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
      <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="h4 text-primary"><i class="fas fa-user-plus"></i> Tambah Teknisi</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('teknisi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="nama" id="nama" class="form-control border-left-warning @if(session()->has('error-nama')) is-invalid @endif" value="{{old('nama')}}" placeholder="Nama teknisi" required="">
                            <div class="invalid-feedback">{{ Session::get('error-nama') }}</div>
                        </div>

                        <div class="form-group">
                            <textarea name="alamat" id="alamat" cols="30" rows="1" class="form-control border-left-warning" placeholder="Alamat teknisi" required="">{{old('alamat')}}</textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control border-left-warning" value="{{old('email')}}" placeholder="Email teknisi" required="">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="kontak" id="kontak" class="form-control border-left-warning" value="{{old('kontak')}}" placeholder="Masukkan kontak teknisi" required="">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="float-right btn btn-outline-info shadow-sm">Tambah Data</button>
                            <a href="{{ route('teknisi.index') }}" class="float-right btn btn-outline-warning mr-2 shadow-sm"><i class="fa fa-undo"></i> Kembali</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <!-- / .col -->
    </div>
    <!-- / .row -->
</div>
@endsection
