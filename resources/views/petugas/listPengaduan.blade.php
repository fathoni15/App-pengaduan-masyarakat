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
                        <th>Tanggal Kejadian</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $dt->created_at->diffForHumans() }}</td>
                        <td>{{$dt->nik}}</td>
                        <td>{{$dt->user->name}}</td>
                        <td>{{$dt->tgl_kejadian}}</td>
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
                        <td>
                            @if ($dt->status == '0')
                                <button href="#" class="btn btn-secondary" data-toggle="modal" data-target="{{ '#tanggapi'.$dt->id }}">Tanggapi</button>
                            @elseif ($dt->status == 'proses')
                                <a href="{{ route('petugas.selesai', $dt->id) }}" class="btn btn-primary" onclick="return confirm('Apakah anda ingin menyelesaikan laporan ini?')">Selesai</a>
                            @else
                                Horray beres!!
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($data as $dt)
{{-- modal --}}
<div id="{{ 'tanggapi'.$dt->id }}" class="modal fade" role="dialog">
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
            <form method="post" action="{{ route('petugas.proses', $dt->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <label for="tanggapan">Tanggapan Anda :</label>
                    <textarea name="tanggapan" id="tanggapan" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Kirim </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
