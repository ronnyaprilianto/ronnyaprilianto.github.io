@extends('layouts.app')

@section('content')

@role('admin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="header">
                    <h1>Welcome, {{ Auth::user()->name }}</h1>
                </div>
                        <div class="card-body">
                            <a href="{{ route('users') }}" class="btn btn-outline-dark btn-block btn-lg text-left">Daftar Pengguna</a>
                            <a href="{{ route('tanggapan.verif') }}" class="btn btn-outline-success btn-block btn-lg text-left text-dark">Verifikasi dan Validasi</a>
                            <a href="#" class="btn btn-outline-danger btn-block btn-lg text-left text-dark">Memberikan Tanggapan</a>

            </div>
        </div>
    </div>
@endrole

@role('masyarakat')
<div class="container text-center">
    <h1>Selamat Datang</h1>
    <h3>Silahkan masukkan Laporan Anda</h3>
        <div class="card-body">
            <a href="{{ route('pengaduan.index') }}" class="btn btn-outline-dark btn-block">Masukkan Laporan</a>
        </div>
@endrole
@endsection
