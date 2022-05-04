<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;
class Teknisi extends Model
{
    //
    protected $table="teknisi";
    protected $primaryKey="id_teknisi";
    protected $keyType="string";
    protected $fillable = [
        'nama','alamat', 'email', 'kontak'
    ];
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id_teknisi = Str::uuid();
        });
    }

}
