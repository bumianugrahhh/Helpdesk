<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;
class Pengaduan extends Model
{
    //
    protected $table="pengaduan";
    protected $primaryKey="id_pengaduan";
    protected $keyType="string";
    protected $fillable = [
        'id_instansi','id_teknisi','tgl_pengaduan', 'judul_pengaduan', 'isi_pengaduan', 'status_pengaduan','bukti_proses','bukti_selesai'
    ];
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_pengaduan = Str::uuid();
        });
    }

    public static function getAll()
    {
        $val=DB::table('pengaduan')->select('pengaduan.*','instansi.nama_instansi','teknisi.nama')
            ->Join('instansi','pengaduan.id_instansi','=','instansi.id_instansi')
            ->leftJoin('teknisi','pengaduan.id_teknisi','=','teknisi.id_teknisi')
            ->OrderBy('pengaduan.created_at','DESC')
            ->get();
        return $val;
    }

    public static function getForUser($idinstansi='')
    {
        $val=DB::table('pengaduan')->select('*')
            ->where('id_instansi','=',$idinstansi)
            ->OrderBy('pengaduan.created_at','DESC')
            ->get();
        return $val;
    }

    public static function getForId($idpengaduan='')
    {
        $val=DB::table('pengaduan')->select('pengaduan.*','instansi.nama_instansi','teknisi.nama')
            ->Join('instansi','pengaduan.id_instansi','=','instansi.id_instansi')
            ->leftJoin('teknisi','pengaduan.id_teknisi','=','teknisi.id_teknisi')
            ->where('id_pengaduan','=',$idpengaduan)
            ->first();
        return $val;
    }
}
