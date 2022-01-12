@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify">
            <div class="col-md-10">
                <div class="card">
                        <div class="card-body">
                            <h3>Detail Pengaduan</h3>
                            <div class="row">
                                <div class="col-8">
                                    <table class="table">
                                        <tr>
                                            <td>Tanggal Lapor</td>
                                            <td>{{ $data->tgl_pengaduan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Judul Laporan</td>
                                            <td>{{ $data->judul }}</td>
                                        </tr>
                                        <tr>
                                            <td>Isi Laporan</td>
                                            <td>{{ $data->isi_laporan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>{{ $data->status }}</td>
                                        </tr>
                                    </table>
                                    <form action="{{ route('tanggapan.simpan', ['id' => $data->id]) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tanggapan</label>
                                            <textarea class="form-control" name="tanggapan" rows="3" placeholder="Isikan Tanggapan">{{ $datatanggapan->tanggapan ?? 'Belum ada Tanggapan' }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="Belum ada Tanggapan" @if($data->status == 'Belum ada Tanggapan') selected @endif>Belum ada Tanggapan</option>
                                                <option value="Sedang di Proses" @if($data->status == 'Belum ada Tanggapan') selected @endif>Sedang di Proses</option>
                                                <option value="Selesai" @if($data->status == 'Belum ada Tanggapan') selected @endif>Selesai</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-dark" value="Simpan">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-4">

                                    <img class="img-fluid" src="{{ asset('foto/'.$data->foto) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('tanggapan.verif') }}" class="btn btn-success">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
