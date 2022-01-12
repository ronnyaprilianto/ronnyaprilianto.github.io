@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-dark text-white">Detail</div>
                        <div class="card-body">
                            <h5>Detail Pengaduan Anda</h5>
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
                                </div>
                                <div class="col-4">

                                    <img class="img-fluid" src="{{ asset('foto/'.$data->foto) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('pengaduan.index') }}" class="btn btn-success">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
