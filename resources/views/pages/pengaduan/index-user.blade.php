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
    <h4 class="h4 mb-0 text-gray-800"><i class="fa fa-fw fa-list"></i> Daftar Pengaduan</h4>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1%">No.</th>
                            <th width="1%">Tanggal</th>
                            <th>Judul</th>
                            <th width="1%">Status</th>
                            <th width="1%" class="text-nowrap">Isi Pengaduan</th>
                            <th width="1%" data-orderable="false" class="text-nowrap">Bukti Proses</th>
                            <th width="1%" data-orderable="false" class="text-nowrap">Bukti Selesai</th>
                            <th width="1%" data-orderable="false">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        @foreach($data as $r)
                        <tr>
                            <td class="text-nowrap">{{$no++}}</td>
                            <td class="text-nowrap"><?=date('d-m-Y',strtotime($r->tgl_pengaduan))?></td>
                            <td class="">{{$r->judul_pengaduan}}</td>
                            <td class="text-nowrap">
                                @if($r->status_pengaduan=='Antrian')
                                    <span class="badge-warning p-1">{{$r->status_pengaduan}}</span>
                                @elseif($r->status_pengaduan=='Proses')
                                    <span class="badge-info p-1">{{$r->status_pengaduan}}</span>
                                @elseif($r->status_pengaduan=='Selesai')
                                    <span class="badge-success p-1">{{$r->status_pengaduan}}</span>
                                @elseif($r->status_pengaduan=='Batal')
                                    <span class="badge-danger p-1">{{$r->status_pengaduan}}</span>
                                @endif
                            </td>
                            <td class="">{{$r->isi_pengaduan}}</td>
                            <td class="text-nowrap">
                                @if($r->status_pengaduan=='Proses' || $r->status_pengaduan=='Selesai')
                                    <a href="{{asset('public/asset/img/buktiproses')}}/{{$r->bukti_proses}}" target="_blank" class="btn btn-info btn-sm">View</a>
                                @else
                                    <i>Tidak tersedia</i>
                                @endif
                            </td>
                            <td class="text-nowrap">
                                @if($r->status_pengaduan=='Selesai')
                                    <a href="{{asset('public/asset/img/buktiselesai')}}/{{$r->bukti_selesai}}" target="_blank" class="btn btn-info btn-sm">View</a>
                                @else
                                <i>Tidak tersedia</i>
                                @endif
                            </td>
                            <td class="text-nowrap">
                                @if($r->status_pengaduan=='Antrian')
                                <a href="" data-toggle="modal" data-target="#modalEdit" class="btn btn-sm btn-outline-success" id="edit-pengaduan" data-id="{{$r->id_pengaduan}}"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                <a href="" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-outline-danger" id="hapus-pengaduan" data-id="{{$r->id_pengaduan}}"><i class="fas fa-user-times"></i></a>
                                @else
                                <i>Tidak tersedia</i>
                                @endif
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
                <h5 class="modal-title text-primary"><i class="fas fa-user-times"></i>  Hapus Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pengaduan.delete') }}" method="post">
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

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title text-white"><i class="fas fa-edit"></i> Edit Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('pengaduan.update1')}}" id="formTambahData" method="post" accept-charset="utf-8">
                @csrf
            <div class="modal-body modal-edit">
                <input type="hidden" name="id" id="id" value="">
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
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </div>
            </div>
            </form>        </div>
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

        $(document).on("click", "#hapus-pengaduan", function() {
            $(".modal-body #id").val($(this).data('id'));
        });

        $(document).on("click", "#edit-pengaduan", function() {
            var id = $(this).data('id');
            $(".modal-edit #id").val(id);
            $.get('pengaduan-edit/' + id, function (data) {
                $(".modal-edit #judul_pengaduan").val(data.data.judul_pengaduan);
                $(".modal-edit #isi_pengaduan").val(data.data.isi);
            })
        });
    </script>
@endpush