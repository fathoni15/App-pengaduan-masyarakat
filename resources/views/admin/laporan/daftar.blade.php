@extends('layouts.template')
@section('title','Daftar Pengaduan')
@section('content')
<div class="card border-left-primary shadow">
    <div class="card-header">
        <h2>
            Daftar Laporan
        </h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="data1">
                <thead>
                    <tr class="text-center">
                        <th>NO.</th>
                        <th>Waktu Pengaduan</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $dt->created_at->diffForHumans() }}</td>
                        <td>{{$dt->nik}}</td>
                        <td>
                            @if ($dt->user == NULL)
                                User ini belum terdaftar
                            @else
                                {{$dt->user->name}}
                            @endif
                        </td>
                        <td>{{$dt->isi_laporan}}</td>
                        <td><a href="{{ asset('image/'.$dt->foto) }}" target="_blank">Lihat</a></td>
                        <td>
                            @if($dt->status == '0')
                                <span class="badge badge-primary">
                                    Menuggu...
                                </span>
                            @elseif($dt->status == 'proses')
                                <span class="badge badge-secondary">
                                    Diproses
                                </span>
                            @else
                                <span class="badge badge-success">
                                    Selesai
                                </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
