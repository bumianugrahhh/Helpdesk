<?php

namespace App\Http\Controllers;

use App\Model\Instansi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class InstansiController extends Controller
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
        $data=Instansi::getAll();
        return view('pages.pengguna.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.pengguna.create');
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
        $nama=$request->nama_instansi; $email=$request->email; $alamat=$request->alamat;
        $kontak=$request->kontak; $username=$request->username; $pass1=$request->pass1;
        $pass2=$request->pass2; $hashedPassword = Hash::make($pass1);

        $cekuser=User::where('username','=',$username)->count();
        if($cekuser > 0){
            return redirect()->back()->withInput()->with('error-user', 'Username sudah terpakai!');
        }

        if($pass1 != $pass2){
            return redirect()->back()->withInput()->with('error-pass', 'Password konfirmasi tidak sama!');
        }

        $q=new Instansi();
        $q->nama_instansi=$nama; $q->email=$email; $q->alamat=$alamat; $q->kontak=$kontak;
        $q->save();
        if($q){
            $instansi=Instansi::where('id_instansi','<>','')->OrderBy('created_at','DESC')->first();
            $q1=new User();
            $q1->id_instansi=$instansi->id_instansi;
            $q1->username=$username; $q1->password=$hashedPassword; $q->tipe='USER';
            $q1->save();
            return redirect()->route('instansi.index')->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan proses simpan data!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function show(Instansi $instansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function edit(Instansi $instansi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instansi $instansi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id=$request->id;
        $q=Instansi::find($id)->delete();
        if($q){
            $q1=User::where('id_instansi','=',$id)->delete();
            return redirect()->route('instansi.index')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('instansi.index')->with('error', 'Terjadi kesalahan proses hapus data!');
        }
    }
}
