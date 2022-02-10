@extends('layouts.template')
@section('title','Daftar Petugas')
@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header">
            <h2>Daftar Petugas</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data1">
                    <thead>
                        <tr class="text-center">
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                        <tr class="text-center">
                            <td>{{$dt->nik}}</td>
                            <td>{{$dt->name}}</td>
                            <td>{{$dt->email}}</td>
                            <td>{{$dt->phone}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
