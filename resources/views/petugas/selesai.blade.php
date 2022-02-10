@extends('layouts.template')
@section('title','Daftar Laporan Selesai')
@section('content')
<div class="card border-left-primary shadow">
    <div class="card-header">
        <h2>
            Daftar Laporan Selesai
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
                        <th>Tanggal Kejadian</th>
                        <th>Tanggapan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $dt->created_at->diffForHumans() }}</td>
                        <td>{{$dt->nik}}</td>
                        <td>{{$dt->user->name}}</td>
                        <td>{{$dt->isi_laporan}}</td>
                        <td><a href="{{ asset('image/'.$dt->foto) }}" target="_blank">Lihat</a></td>
                        <td>{{$dt->tgl_kejadian}}</td>
                        <td><button href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="{{ '#tanggapan'.$dt->id }}">Lihat Tanggapan</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($data as $dt)
{{-- modal --}}
<div id="{{ 'tanggapan'.$dt->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title">Tanggapan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- body modal -->
                <div class="modal-body">
                    <label for="tanggapan">Tanggapan :</label>
                    <textarea name="tanggapan" id="tanggapan" cols="30" rows="10" class="form-control" disabled>{{ $dt->tanggapan->tanggapan }}</textarea>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
        </div>
    </div>
</div>
@endforeach
@endsection
