@extends('layouts.template')
@section('title','Masyarakat')
@section('content')
    <div class="card shadow">
        <div class="card-header"><h2>Ajukan Pengaduan</h2></div>
        <div class="card-body">
            <form action="{{ route('masyarakat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="nik" value="{{ Auth::user()->nik }}">

            <div class="form-group">
                <label for="isi_laporan">Isi Laporan</label>
                <textarea name="isi_laporan" id="isi_laporan" cols="30" rows="10" class="form-control" required>{{ old('isi_laporan') }}</textarea>

                @error('isi_laporan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tgl_kejadian">Tanggal Kejadian</label>
                    <input id="tgl_kejadian" type="date" class="form-control @error('tgl_kejadian') is-invalid @enderror" name="tgl_kejadian" value="{{ old('tgl_kejadian') }}" required autocomplete="tgl_kejadian" autofocus>

                    @error('tgl_kejadian')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="foto">Foto</label>
                    <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" required autocomplete="foto" autofocus>

                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i> Kirim</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
