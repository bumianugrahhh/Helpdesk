<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UbahPasswordController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $data=User::find(Auth()->user()->id_user);
        return view('pages.ubah-password.index',compact('data'));
    }

    public function update(Request $request)
    {
        //
        $username=$request->username; $pass=$request->newpass; $pass2=$request->newpass2;
        $hashedPassword = Hash::make($pass);

        $cekuser=User::where('username','=',$username)
        	->where('id_user','<>',Auth()->user()->id_user)->count();
        if($cekuser > 0){
            return redirect()->back()->withInput()->with('error-username', 'Username sudah terpakai!');
        }

        if($pass != $pass2){
            return redirect()->back()->withInput()->with('error-pass', 'Password konfirmasi tidak sama!');
        }

        $q=User::find(Auth()->user()->id_user);
        $q->username=$username; $q->password=$hashedPassword; 
        if($request->file('foto') != NULL || $request->file('foto') != ''){
                $file = strtolower($request->file('foto')->getClientOriginalName()); 
                $namafile=Str::uuid();
                //$filename = pathinfo($file, PATHINFO_FILENAME);
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                $file_foto=$namafile.'.'.$extension;
                $q->foto=$namafile.'.'.$extension;
            }
        $q->save();
        if($q){
        	if($request->file('foto') != NULL || $request->file('foto') != ''){
                $dir = 'public/asset/img/foto/';
                $request->file('foto')->move($dir, $file_foto);
            }
            return redirect()->route('ubah-password.index')->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan proses simpan data!');
        }
    }
}
