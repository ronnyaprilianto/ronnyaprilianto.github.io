@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <h2 class="modal-header">Tambah Laporan Anda</h2>
                    <div class="card-body">
                        <form section="{{ route('pengaduan.simpan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Judul</label>
                            <input id="name" type="text" class="form-control" name="judul" placeholder="Masukkan Judul Laporan Anda">
                        </div>
                      <div class="form-group">
                          <label>Isi Laporan</label>
                          <textarea placeholder="Isikan Laporan Anda" class="form-control" rows="5" name="laporan"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto">
                      </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-danger btn-block">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                    <div class="card-body">
                            <table class="table table-hover">
                                <h3 class="header">Laporan Anda</h3>
                              <tr>
                                <th>No</th>
                                <th>Tanggal Lapor</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Detail</th>
                              </tr>
                              @foreach ($data as $d)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->tgl_pengaduan }}</td>
                                <td>{{ $d->judul }}</td>
                                <td>{{ $d->status }}</td>
                                <td><a href="{{ route('pengaduan.detail', ['id' => $d->id]) }}" class="btn btn-info">Lihat Detail</td>
                              </tr>

                              @endforeach

@endsection
