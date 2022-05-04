@extends('layouts.template')
@push('head')
<!-- Custom styles for this page -->
    <link href="{{asset('public/asset/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="h4 mb-0 text-gray-800"><i class="fa fa-fw fa-users"></i> Kelola Pengguna</h4>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('instansi.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1%">No.</th>
                            <th>Nama Instansi</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Kontak</th>
                            <th>Username</th>
                            <th width="1%" data-orderable="false">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        @foreach($data as $r)
                        <tr>
                            <td class="text-nowrap">{{$no++}}</td>
                            <td class="text-nowrap">{{$r->nama_instansi}}</td>
                            <td class="text-nowrap">{{$r->email}}</td>
                            <td class="text-nowrap">{{$r->alamat}}</td>
                            <td class="text-nowrap">{{$r->kontak}}</td>
                            <td class="text-nowrap">{{$r->username}}</td>
                            <td class="text-nowrap">
                                <a href="" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-outline-danger" id="hapus-pengguna" data-id="{{$r->id_instansi}}"><i class="fas fa-user-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Hapus Data Pengguna -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h5 class="modal-title text-primary"><i class="fas fa-user-times"></i>  Hapus Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('instansi.delete') }}" method="post">
                @csrf
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                    <input type="hidden" name="id" id="id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yakin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
<!-- Page level plugins -->
    <script src="{{asset('public/asset/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/asset/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive:true,
                processing:true,
                columnDefs: [
                    { responsivePriority: 2, targets: -1 }
                ]
            });
        });

        $(document).on("click", "#hapus-pengguna", function() {
            $(".modal-body #id").val($(this).data('id'));
        });
    </script>
@endpush