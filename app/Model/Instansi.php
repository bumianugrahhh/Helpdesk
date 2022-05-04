<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;
class Instansi extends Model
{
    //
    protected $table="instansi";
    protected $primaryKey="id_instansi";
    protected $keyType="string";
    protected $fillable = [
        'nama_instansi','email','alamat', 'kontak'
    ];
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_instansi = Str::uuid();
        });
    }

    public static function getAll()
    {
        $val=DB::table('instansi')->select('instansi.*','users.username','users.foto','users.tipe')
            ->leftJoin('users','instansi.id_instansi','=','users.id_instansi')
            ->OrderBy('instansi.created_at','DESC')
            ->get();
        return $val;
    }
}
