<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masyarakat.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listPengaduan()
    {
        $data = Pengaduan::where('nik','=', Auth::user()->nik)->get();
        return view('masyarakat.listPengaduan', compact('data'));
    }

    public function create()
    {
        $data = Pengaduan::all();
        return view('masyarakat.add', compact('data'));
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

        return redirect()->route('masyarakat.listPengaduan');
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
