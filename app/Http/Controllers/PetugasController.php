<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('petugas.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listPengaduan()
    {
        $data = Pengaduan::all();
        return view('petugas.listPengaduan', compact('data'));
    }

    public function listSelesai()
    {
        $data = Pengaduan::where('status','=','selesai')->get();
        return view('petugas.selesai', compact('data'));
    }

    public function proses($id, Request $request)
    {
        $status = Pengaduan::find($id)->update(['status'=>'proses']);

        Tanggapan::create([
            'id_pengaduan'=>$id,
            'tanggapan'=>$request->tanggapan,
            'id_petugas'=> Auth::user()->id,
        ]);

        return redirect()->back();
    }

    public function selesai($id)
    {
        Pengaduan::find($id)->update(['status'=>'selesai']);
        return redirect()->route('petugas.listSelesai');
    }

    public function create()
    {
        $data = Pengaduan::all();
        return view('petugas.buat', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imgname = $request->foto->getClientOriginalName();
        $request->foto->move(public_path('image'), $imgname);

        Pengaduan::create([
            'nik'=>$request->nik,
            'tgl_kejadian'=>$request->tgl_kejadian,
            'isi_laporan'=>$request->isi_laporan,
            'foto'=>$imgname,
        ]);

        return redirect()->route('petugas.listPengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
