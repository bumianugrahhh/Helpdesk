<?php

namespace App\Http\Controllers;

use App\Model\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth()->user()->tipe=='ADMIN') {
            $antrian=Dashboard::getDalamAntrian('ADMIN','');
            $proses=Dashboard::getDalamProses('ADMIN','');
            $selesai=Dashboard::getSelesai('ADMIN','');
            $batal=Dashboard::getBatal('ADMIN','');
            return view('pages.dashboard',compact('antrian','proses','selesai','batal'));
        } else {
            $antrian=Dashboard::getDalamAntrian('',Auth()->user()->id_instansi);
            $terkirim=Dashboard::getTerkirim(Auth()->user()->id_instansi);
            $proses=Dashboard::getDalamProses('',Auth()->user()->id_instansi);
            $selesai=Dashboard::getSelesai('',Auth()->user()->id_instansi);
            $batal=Dashboard::getBatal('',Auth()->user()->id_instansi);
            return view('pages.dashboard-user',compact('antrian','terkirim','proses','selesai','batal'));
        }
    }
}
