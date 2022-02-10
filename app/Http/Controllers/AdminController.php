<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function listPengaduan()
    {
        $data = Pengaduan::all();
        return view('admin.laporan.daftar', compact('data'));
    }

    public function listSelesai()
    {
        $data = Pengaduan::where('status','=','selesai')->get();
        return view('admin.laporan.selesai', compact('data'));
    }

    public function listPetugas()
    {
        $data = User::where('level','=','petugas')->get();
        return view('admin.petugas.list', compact('data'));
    }

    public function addPetugas()
    {
        $data = User::all();
        return view('admin.petugas.add', compact('data'));
    }

    public function petugasStore(Request $request)
    {
        User::create ([
            'name'=>$request->name,
            'nik'=>$request->nik,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=> Hash::make($request['password']),
            'level'=>'petugas',
        ]);

        return redirect()->route('admin.listPetugas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
