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
    <h4 class="h4 mb-0 text-gray-800"><i class="fa fa-fw fa-list"></i> Data Pengaduan</h4>
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
                            <th width="1%">Instansi</th>
                            <th width="1%">Status</th>
                            <th width="1%" data-orderable="false">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        @foreach($data as $r)
                        <tr>
                            <td class="text-nowrap">{{$no++}}</td>
                            <td class="text-nowrap"><?=date('d-m-Y',strtotime($r->tgl_pengaduan))?></td>
                            <td class="text-nowrap">{{$r->judul_pengaduan}}</td>
                            <td class="text-nowrap">{{$r->nama_instansi}}</td>
                            <td class="text-nowrap">
                                @if($r->status_pengaduan=='Antrian')
                                    <span class="badge-success p-1">{{$r->status_pengaduan}}</span>
                                @elseif($r->status_pengaduan=='Proses')
                                    <span class="badge-info p-1">{{$r->status_pengaduan}}</span>
                                @elseif($r->status_pengaduan=='Selesai')
                                    <span class="badge-primary p-1">{{$r->status_pengaduan}}</span>
                                @elseif($r->status_pengaduan=='Batal')
                                    <span class="badge-danger p-1">{{$r->status_pengaduan}}</span>
                                @endif
                            </td>
                            <td class="text-nowrap">
                                @if($r->status_pengaduan=='Antrian')
                                <a href="" data-toggle="modal" data-target="#detail-pengaduan" class="btn btn-sm btn-outline-info" id="details" data-id="{{$r->id_pengaduan}}" ><i class="fas fa-eye"></i> Detail</a>
                                @elseif($r->status_pengaduan=='Proses')
                                <a href="" data-toggle="modal" data-target="#detail-pengaduan2" class="btn btn-sm btn-outline-info" id="details2" data-id="{{$r->id_pengaduan}}" ><i class="fas fa-eye"></i> Detail</a>
                                @else
                                <a href="" data-toggle="modal" data-target="#detail-pengaduan1" class="btn btn-sm btn-outline-info" id="details1" data-id="{{$r->id_pengaduan}}" ><i class="fas fa-eye"></i> Detail</a>
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
<!-- Detail -->
<div class="modal fade" id="detail-pengaduan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" ><i class="fas fa-eye"></i> Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('pengaduan.update')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="id_pengaduan">
                    <table class="table table-bordered text-justify text-gray-900">
                        <tr>
                            <td>Tanggal</td>
                            <td class="tgl"></td>
                        </tr>
                        <tr>
                            <td>Instansi</td>
                            <td class="instansi"></td>
                        </tr>
                        <tr>
                            <td>Mengenai</td>
                            <td class="judul"></td>
                        </tr>
                        <tr>
                            <td>Isi</td>
                            <td class="isi"></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td class="status"></td>
                        </tr>
                        <tr id="rowteknisi">
                            <td>Teknisi</td>
                            <td class="teknisi"></td>
                        </tr>
                        <tr>
                            <td>Ubah Status</td>
                            <td>
                                <select name="status_pengaduan" id="statuspilih" class="form-control" required></select>
                            </td>
                        </tr>
                        <tr id="rownamateknisi">
                            <td>Nama Teknisi</td>
                            <td>
                                <select name="status_teknisi" id="namateknisi" class="form-control" required>
                                    <option value="">-- PILIH NAMA TEKNISI --</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="rowbuktiproses">
                            <td>Bukti Proses</td>
                            <td><input type="file" name="fotoproses" required="" accept="image/*"></td>
                        </tr>
                        <tr id="rowbuktiselesai">
                            <td>Bukti Selesai</td>
                            <td><input type="file" name="fotoselesai" required="" accept="image/*"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnsubmit">Ubah Status Pengaduan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="detail-pengaduan2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" ><i class="fas fa-eye"></i> Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('pengaduan.update')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="id_pengaduan">
                    <table class="table table-bordered text-justify text-gray-900">
                        <tr>
                            <td>Tanggal</td>
                            <td class="tgl"></td>
                        </tr>
                        <tr>
                            <td>Instansi</td>
                            <td class="instansi"></td>
                        </tr>
                        <tr>
                            <td>Mengenai</td>
                            <td class="judul"></td>
                        </tr>
                        <tr>
                            <td>Isi</td>
                            <td class="isi"></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td class="status"></td>
                        </tr>
                        <tr>
                            <td>Teknisi</td>
                            <td class="teknisi2"></td>
                        </tr>
                        <tr>
                            <td>Ubah Status</td>
                            <td>
                                <select name="status_pengaduan" id="statuspilih1" class="form-control" required>
                                    <option value="" selected="">-- PILIH STATUS TERBARU --</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Bukti Selesai</td>
                            <td><input type="file" name="fotoselesai" required="" accept="image/*"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnsubmit">Ubah Status Pengaduan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Detail -->
<div class="modal fade" id="detail-pengaduan1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" ><i class="fas fa-eye"></i> Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="id_pengaduan">
                    <table class="table table-bordered text-justify text-gray-900">
                        <tr>
                            <td>Tanggal</td>
                            <td class="tgl"></td>
                        </tr>
                        <tr>
                            <td>Instansi</td>
                            <td class="instansi"></td>
                        </tr>
                        <tr>
                            <td>Mengenai</td>
                            <td class="judul"></td>
                        </tr>
                        <tr>
                            <td>Isi</td>
                            <td class="isi"></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td class="status"></td>
                        </tr>
                        <tr id="rowteknisi">
                            <td>Teknisi</td>
                            <td class="teknisi1"></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">Bukti Proses</td>
                            <td class="imgbuktiproses" style="text-align: center;">
                                <a href="" target="_blank" id="linkbuktiproses"><img id="imgbuktiproses" src="" class="card-img-top" height="200";/></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">Bukti Selesai</td>
                            <td class="imgbuktiselesai" style="text-align: center;">
                                <a href="" target="_blank" id="linkbuktiselesai"><img id="imgbuktiselesai" src="" class="card-img-top" height="200";/></a>
                            </td>
                        </tr>
                    </table>
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

        $('body').on('click', '#details', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        console.log(id)
        $.get('pengaduan/get/' + id, function (data) {
            $(".modal-body #id_pengaduan").val(data.data.id_pengaduan);
            $(".modal-body table .tgl").html(data.data.tgl_pengaduan);
            $(".modal-body table .instansi").html(data.data.nama_instansi);
            $(".modal-body table .judul").html(data.data.judul_pengaduan);
            $(".modal-body table .isi").html(data.data.isi);
            $(".modal-body table .status").html(data.data.status);
            if(data.data.status=='Antrian'){
                var row = document.getElementById('rowteknisi');
                row.parentNode.removeChild(row);
            } else {
                $(".modal-body table .teknisi").html(data.data.teknisi);
            }
            $('#statuspilih option').remove();
            if(data.data.status=='Antrian'){
                $('#statuspilih').append("<option value=''>-- PILIH STATUS TERBARU --</option>");
                $('#statuspilih').append("<option value='Proses'>Proses</option>");
                $('#statuspilih').append("<option value='Batal'>Batal</option>");
            }
            if(data.data.status=='Proses'){
                $('#statuspilih').append("<option value=''>-- PILIH STATUS TERBARU --</option>");
                $('#statuspilih').append("<option value='Selesai'>Selesai</option>");
            }
            
            if(data.data.status != 'Antrian'){
                var row = document.getElementById('rownamateknisi');
                row.parentNode.removeChild(row);
            } else {
                $.ajax({
                    type:"GET",
                    url:"{{url('/teknisi-getdata')}}",
                    dataType:'JSON',
                    success:function(res){
                        console.log(res);
                        if(res){
                            $('#namateknisi').empty();
                            $('#namateknisi').append('<option>-- PILIH NAMA TEKNISI --</option');
                            $.each(res, function(id_teknisi, nama){
                                $('#namateknisi').append('<option value="'+id_teknisi+'">'+nama+'</option>');
                            })
                        } else {
                            $('#namateknisi').empty();
                            $('#namateknisi').append('<option>-- PILIH NAMA TEKNISI --</option');
                        }
                    }
                })
            }

            if(data.data.status == 'Antrian'){
                var row = document.getElementById('rowbuktiselesai');
                row.parentNode.removeChild(row);
            }

            if(data.data.status == 'Proses'){
                var row = document.getElementById('rowbuktiproses');
                row.parentNode.removeChild(row);
            }

            if(data.data.status == 'Batal' || data.data.status == 'Selesai'){
                document.getElementById('btnsubmit').style.display = "none";
            } else {
                document.getElementById('btnsubmit').style.display = "block";
            }
     })
    });

        $('body').on('click', '#details1', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        console.log(id)
        $.get('pengaduan/get1/' + id, function (data) {
            $(".modal-body #id_pengaduan").val(data.data.id_pengaduan);
            $(".modal-body table .tgl").html(data.data.tgl_pengaduan);
            $(".modal-body table .instansi").html(data.data.nama_instansi);
            $(".modal-body table .judul").html(data.data.judul_pengaduan);
            $(".modal-body table .isi").html(data.data.isi);
            $(".modal-body table .status").html(data.data.status);
            $(".modal-body table .teknisi1").html(data.data.teknisi);
            $('#imgbuktiproses').attr('src', "{{asset('public/asset/img/buktiproses')}}/"+data.data.foto_proses);
            $('#linkbuktiproses').attr('href', "{{asset('public/asset/img/buktiproses')}}/"+data.data.foto_proses);
            $('#imgbuktiselesai').attr('src', "{{asset('public/asset/img/buktiselesai')}}/"+data.data.foto_selesai);
            $('#linkbuktiselesai').attr('href', "{{asset('public/asset/img/buktiselesai')}}/"+data.data.foto_selesai);
     })
    });

        $('body').on('click', '#details2', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        console.log(id)
        $.get('pengaduan/get/' + id, function (data) {
            $(".modal-body #id_pengaduan").val(data.data.id_pengaduan);
            $(".modal-body table .tgl").html(data.data.tgl_pengaduan);
            $(".modal-body table .instansi").html(data.data.nama_instansi);
            $(".modal-body table .judul").html(data.data.judul_pengaduan);
            $(".modal-body table .isi").html(data.data.isi);
            $(".modal-body table .status").html(data.data.status);
            $(".modal-body table .teknisi2").html(data.data.teknisi);

            console.log(data);
     })
    });
    </script>
@endpush