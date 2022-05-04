<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Dashboard extends Model
{
    //
    protected static function getDalamAntrian($tipe='',$idinstansi='')
    {
    	if($tipe=='ADMIN'){
    		$jumlah=DB::table('pengaduan')->where('status_pengaduan','=','Antrian')->count();
    	} else {
    		$jumlah=DB::table('pengaduan')->where('status_pengaduan','=','Antrian')
    			->where('id_instansi','=',$idinstansi)->count();
    	}
    	return $jumlah;
    }

    protected static function getTerkirim($idinstansi='')
    {
    	
    	$jumlah=DB::table('pengaduan')->where('id_instansi','=',$idinstansi)->count();
    	return $jumlah;
    }

    protected static function getDalamProses($tipe='',$idinstansi='')
    {
    	if($tipe=='ADMIN'){
    		$jumlah=DB::table('pengaduan')->where('status_pengaduan','=','Proses')->count();
    	} else {
    		$jumlah=DB::table('pengaduan')->where('status_pengaduan','=','Proses')
    			->where('id_instansi','=',$idinstansi)->count();
    	}
    	return $jumlah;
    }

    protected static function getSelesai($tipe='',$idinstansi='')
    {
    	if($tipe=='ADMIN'){
    		$jumlah=DB::table('pengaduan')->where('status_pengaduan','=','Selesai')->count();
    	} else {
    		$jumlah=DB::table('pengaduan')->where('status_pengaduan','=','Selesai')
    			->where('id_instansi','=',$idinstansi)->count();
    	}
    	return $jumlah;
    }

    protected static function getBatal($tipe='',$idinstansi='')
    {
    	if($tipe=='ADMIN'){
    		$jumlah=DB::table('pengaduan')->where('status_pengaduan','=','Batal')->count();
    	} else {
    		$jumlah=DB::table('pengaduan')->where('status_pengaduan','=','Batal')
    			->where('id_instansi','=',$idinstansi)->count();
    	}
    	return $jumlah;
    }
}
