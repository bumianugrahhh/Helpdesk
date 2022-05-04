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
    <div class="row">
      <div class="col-md-3"></div>
        <div class="col-md-6">

            <!-- Flash data -->
            
            
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <!-- Page Heading -->
                    <h4 class="h4 text-primary"><i class="fas fa-fw fa-key"></i> Ubah Password</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('ubah-password.update') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control shadow-sm border-left-warning @if(session()->has('error-username')) is-invalid @endif" value="{{$data->username}}" required="">
                        <div class="invalid-feedback">{{ Session::get('error-username') }}</div>
                    </div>

                    <div class="form-group">
                        <label for="newpass">Password Baru</label>
                        <input type="text" name="newpass" id="newpass" class="form-control shadow-sm border-left-warning" value="" required="" minlength="6">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="newpass2">Konfirmasi Password</label>
                        <input type="password" name="newpass2" id="newpass2" class="form-control shadow-sm border-left-warning @if(session()->has('error-pass')) is-invalid @endif" minlength="6" required="">
                        <div class="invalid-feedback">{{ Session::get('error-pass') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Avatar</label>
                        <input type="file" name="foto" id="foto" class="form-control shadow-sm border-left-warning" accept="image/*">
                        <div class="invalid-feedback"></div>
                    </div>
                    <hr>
                    <button type="submit" class="mt-4 btn btn-primary btn-block shadow-lg">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / .row -->
</div>
@endsection
