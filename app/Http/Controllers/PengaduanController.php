<?php

namespace App\Http\Controllers;

use App\Model\Pengaduan;
use App\Model\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth()->user()->tipe=='ADMIN'){
            $data=Pengaduan::getAll(Auth()->user()->id_instansi);
            $teknisi=Teknisi::all();
            return view('pages.pengaduan.index-admin',compact('data','teknisi'));
        } else {
            $data=Pengaduan::getForUser(Auth()->user()->id_instansi);
            return view('pages.pengaduan.index-user',compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.pengaduan.create');
    }

    public function getdata($id='')
    {
        $bulan=array('','Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'Oktober', 'November', 'Desember');
        $pengaduan = Pengaduan::getForId($id);
        $tanggal=date('d',strtotime($pengaduan->tgl_pengaduan)).' '.$bulan[(int) date('m',strtotime($pengaduan->tgl_pengaduan))].' '.date('Y');
        $data=['id_pengaduan'=>$pengaduan->id_pengaduan, 'tgl_pengaduan'=>$tanggal, 'nama_instansi'=>$pengaduan->nama_instansi, 'judul_pengaduan'=>$pengaduan->judul_pengaduan, 'isi'=>$pengaduan->isi_pengaduan, 'status'=>$pengaduan->status_pengaduan, 'teknisi'=>$pengaduan->nama];
        return response()->json([
          'data' => $data
        ]);

    }

    public function getdata1($id='')
    {
        $bulan=array('','Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'Oktober', 'November', 'Desember');
        $pengaduan = Pengaduan::getForId($id);
        $tanggal=date('d',strtotime($pengaduan->tgl_pengaduan)).' '.$bulan[(int) date('m',strtotime($pengaduan->tgl_pengaduan))].' '.date('Y');
        $data=['id_pengaduan'=>$pengaduan->id_pengaduan, 'tgl_pengaduan'=>$tanggal, 'nama_instansi'=>$pengaduan->nama_instansi, 'judul_pengaduan'=>$pengaduan->judul_pengaduan, 'isi'=>$pengaduan->isi_pengaduan, 'status'=>$pengaduan->status_pengaduan, 'teknisi'=>$pengaduan->nama, 'foto_proses'=>$pengaduan->bukti_proses, 'foto_selesai'=>$pengaduan->bukti_selesai];
        return response()->json([
          'data' => $data
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $judul=$request->judul_pengaduan; $isi=$request->isi_pengaduan;
        $q=new Pengaduan();
        $q->id_instansi=Auth()->user()->id_instansi;
        $q->tgl_pengaduan=date('Y-m-d'); $q->judul_pengaduan=$judul; $q->isi_pengaduan=$isi;
        $q->save();
        if($q){
            return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim.');
        } else {
            return redirect()->route('pengaduan.index')->with('error', 'Terjadi kesalahan proses pengiriman pengaduan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit($id='')
    {
        //
        $pengaduan = Pengaduan::getForId($id);
        $data=['judul_pengaduan'=>$pengaduan->judul_pengaduan, 'isi'=>$pengaduan->isi_pengaduan];
        return response()->json([
          'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public static function update1(Request $request)
    {
        $id=$request->id; $judul=$request->judul_pengaduan; $isi=$request->isi_pengaduan;
        $q=Pengaduan::find($id);
        $q->judul_pengaduan=$judul; $q->isi_pengaduan=$isi;
        $q->save();
        if($q){
            return redirect()->route('pengaduan.index')->with('success', 'Data berhasil diperbaharui.');
        } else {
            return redirect()->route('pengaduan.index')->with('error', 'Terjadi kesalahan proses simpan data!');
        }
    }

    public function update(Request $request)
    {
        //
        $id=$request->id; $status=$request->status_pengaduan;
        if($status=='Proses'){
            $namateknisi=$request->status_teknisi;
        }
        $q=Pengaduan::find($id);
        $q->status_pengaduan=$status;
        if($status=='Proses'){
            $q->id_teknisi=$namateknisi;
            if($request->file('fotoproses') != NULL || $request->file('fotoproses') != ''){
                $file = strtolower($request->file('fotoproses')->getClientOriginalName()); 
                $namafile=Str::uuid();
                //$filename = pathinfo($file, PATHINFO_FILENAME);
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                $file_foto=$namafile.'.'.$extension;
                $q->bukti_proses=$namafile.'.'.$extension;
            }
        }
        if($status=='Selesai'){
            if($request->file('fotoselesai') != NULL || $request->file('fotoselesai') != ''){
                $file = strtolower($request->file('fotoselesai')->getClientOriginalName()); 
                $namafile=Str::uuid();
                //$filename = pathinfo($file, PATHINFO_FILENAME);
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                $file_foto=$namafile.'.'.$extension;
                $q->bukti_selesai=$namafile.'.'.$extension;
            }
        }
        $q->save();
        if($q){
            if($status=='Proses'){
                if($request->file('fotoproses') != NULL || $request->file('fotoproses') != ''){
                    $dir = 'public/asset/img/buktiproses/';
                    $request->file('fotoproses')->move($dir, $file_foto);
                }
            }
            if($status=='Selesai'){
                if($request->file('fotoselesai') != NULL || $request->file('fotoselesai') != ''){
                    $dir = 'public/asset/img/buktiselesai/';
                    $request->file('fotoselesai')->move($dir, $file_foto);
                }
            }
            return redirect()->route('pengaduan.index')->with('success', 'Status pengaduan berhasil diperbaharui.');
        } else {
            return redirect()->route('pengaduan.index')->with('error', 'Terjadi kesalahan proses update status!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id=$request->id;
        $q=Pengaduan::find($id)->delete();
        if($q){
            return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
        } else {
            return redirect()->route('pengaduan.index')->with('error', 'Terjadi kesalahan proses penghapusan data!');
        }
    }
}
