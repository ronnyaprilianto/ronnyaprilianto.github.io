@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


                        <table class="table table-hover">
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
                                <td><a href="{{ route('tanggapan.detail', ['id' => $d->id]) }}" class="btn btn-info">Lihat Detail</td>
                              </tr>
                              @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
