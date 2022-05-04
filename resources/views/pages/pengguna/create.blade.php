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
                    <h4 class="h4 text-primary"><i class="fas fa-user-plus"></i> Tambah Pengguna</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('instansi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="nama_instansi" id="nama_instansi" class="form-control border-left-warning" value="{{old('nama_instansi')}}" placeholder="Nama instansi" required="">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control border-left-warning" value="{{old('email')}}" placeholder="Email instansi" required="">
                            <div class="invalid-feedback">
                                                            </div>
                        </div>

                        <div class="form-group">
                            <textarea name="alamat" id="alamat" cols="30" rows="1" class="form-control border-left-warning" placeholder="Alamat instansi" required="">{{old('alamat')}}</textarea>
                            <div class="invalid-feedback">
                                                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="kontak" id="kontak" class="form-control border-left-warning" value="{{old('kontak')}}" placeholder="Masukkan kontak instansi" required="">
                            <div class="invalid-feedback">
                                                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control border-left-warning @if(session()->has('error-user')) is-invalid @endif" value="{{old('username')}}" placeholder="Masukkan username" required="">
                            <div class="invalid-feedback">{{ Session::get('error-user') }}</div>
                        </div>

                        <div class="form-group">
                            <input type="password" name="pass1" minlength="6" id="password" class="form-control border-left-warning" placeholder="Kata sandi" value="{{old('pass1')}}" required="">
                            <div class="invalid-feedback">
                                                            </div>
                        </div>

                        <div class="form-group">
                            <input type="password" name="pass2" minlength="6" id="konfirmasi-password" class="form-control border-left-warning @if(session()->has('error-pass')) is-invalid @endif" placeholder="Ulangi kata sandi" required="" value="{{old('pass2')}}">
                            <div class="invalid-feedback">{{ Session::get('error-pass') }}</div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="float-right btn btn-outline-info shadow-sm">Tambah Data</button>
                            <a href="{{ route('instansi.index') }}" class="float-right btn btn-outline-warning mr-2 shadow-sm"><i class="fa fa-undo"></i> Kembali</a>
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
