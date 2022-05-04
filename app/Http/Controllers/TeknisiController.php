<?php

namespace App\Http\Controllers;

use App\Model\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class TeknisiController extends Controller
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
        $data=Teknisi::All();
        return view('pages.teknisi.index',compact('data'));
    }

    public function getTeknisi(){
        $teknisi = Teknisi::where('id_teknisi','<>','')->pluck('nama','id_teknisi');
        return response()->json($teknisi);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.teknisi.create');
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
        $nama=$request->nama; $email=$request->email; $alamat=$request->alamat;
        $kontak=$request->kontak; 

        $ceknama=Teknisi::where('nama','=',$nama)->count();
        if($ceknama > 0){
            return redirect()->back()->withInput()->with('error-nama', 'Nama teknisi sudah terpakai!');
        }

        $q=new Teknisi();
        $q->nama=$nama; $q->email=$email; $q->alamat=$alamat; $q->kontak=$kontak;
        $q->save();
        if($q){
            return redirect()->route('teknisi.index')->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan proses simpan data!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function show(Teknisi $teknisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Teknisi $teknisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teknisi $teknisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id=$request->id;
        $q=Teknisi::find($id)->delete();
        if($q){
            return redirect()->route('teknisi.index')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('teknisi.index')->with('error', 'Terjadi kesalahan proses hapus data!');
        }
    }
}
