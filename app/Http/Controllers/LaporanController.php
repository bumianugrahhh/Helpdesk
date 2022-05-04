<?php

namespace App\Http\Controllers;

use App\Model\Laporan;
use Illuminate\Http\Request;
use App\Model\Instansi;
use PDF;
class LaporanController extends Controller
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
        $instansi=Instansi::all();
        return view('pages.laporan.laporan',compact('instansi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak(Request $request)
    {
        //
        $operasi=$request->input('action');
        $tglmulai=$request->tgl_mulai; $tglselesai=$request->tgl_selesai;
        $filter=$request->filter;
        $instansi=Instansi::all();
        if($operasi == 'cek'){
            if($filter ==''){
                $laporan=Laporan::getAll($tglmulai, $tglselesai);
            } else {
                $laporan=Laporan::getForInstansi($tglmulai, $tglselesai, $filter);
            }
            return view('pages.laporan.laporan')->with('instansi',$instansi)->with('laporan', $laporan)->with('cek','cek');
        } else {
            if($filter ==''){
                $laporan=Laporan::getAll($tglmulai, $tglselesai);
            } else {
                $laporan=Laporan::getForInstansi($tglmulai, $tglselesai, $filter);
            }
            //return view('pages.laporan.laporan-pdf')->with('laporan', $laporan);
            $pdf = PDF::loadview('pages.laporan.laporan-pdf',['laporan'=>$laporan])->setPaper('a4', 'landscape');
            return $pdf->stream();
        }
        //return view('pages.laporan.laporan',compact('instansi'));   
        //with('error-nama', 'Nama teknisi sudah terpakai!')
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
