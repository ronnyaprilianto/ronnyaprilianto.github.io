@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card-body text-center">
                    <div class="header">
                        <h2>Aplikasi Pengaduan Online Masyarakat</h2>
                        <h4 class="mb-5">Sampaikan laporan Anda langsung kepada pihak berwenang</h4>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('login') }}" class="btn btn-dark btn-block btn-lg">LOGIN</a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('register') }}" class="btn btn-outline-dark btn-block btn-lg">REGISTER</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
