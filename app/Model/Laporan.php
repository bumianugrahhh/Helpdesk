<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;
class Laporan extends Model
{
    //
    public static function getAll($tglawal='', $tglakhir='')
    {
        $val=DB::table('pengaduan')->select('pengaduan.*','instansi.nama_instansi','teknisi.nama')
            ->Join('instansi','pengaduan.id_instansi','=','instansi.id_instansi')
            ->leftJoin('teknisi','pengaduan.id_teknisi','=','teknisi.id_teknisi')
            ->where('pengaduan.tgl_pengaduan', '>=', $tglawal)
            ->where('pengaduan.tgl_pengaduan', '<=', $tglakhir)
            ->OrderBy('pengaduan.created_at','DESC')
            ->get();
        return $val;
    }

    public static function getForInstansi($tglawal='', $tglakhir='', $idinstansi='')
    {
        $val=DB::table('pengaduan')->select('pengaduan.*','instansi.nama_instansi','teknisi.nama')
            ->Join('instansi','pengaduan.id_instansi','=','instansi.id_instansi')
            ->leftJoin('teknisi','pengaduan.id_teknisi','=','teknisi.id_teknisi')
            ->where('pengaduan.id_instansi', '=', $idinstansi)
            ->where('pengaduan.tgl_pengaduan', '>=', $tglawal)
            ->where('pengaduan.tgl_pengaduan', '<=', $tglakhir)
            ->OrderBy('pengaduan.created_at','DESC')
            ->get();
        return $val;
    }
}
