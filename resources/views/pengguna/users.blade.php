@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white text-md-center">
                    <h2>Daftar Pengguna</h2>
                </div>
                    <div class="card-body">

        <button type="button" class="btn btn-dark btn-block mb-4 text-white" data-toggle="modal" data-target="#myModal">
            Tambah Pengguna Baru
        </button>

    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
            <h4 class="modal-title">Pengguna Baru</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" action="{{ route('pengguna.users') }}">
                @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">NIK</label>

                    <div class="col-md-6">
                        <input id="nik" type="text" class="form-control @error('name') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">No. Telp</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="telp" required>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="peran" class="col-md-4 col-form-label text-md-right">Peran</label>
                    <div class="col-md-6">
                        <select name="peran" id="peran" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                            <option value="masyarakat">Masyarakat</option>
                        </select>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row-mb-2">
                    <div class="col-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Tambahkan
                        </button>
                    </div>
                </div>
            </div>
            </form>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                   <table class="table table-hover">
                    <thead>
                        <h4>Admin</h4>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Data</th>
                      </tr>
                    </thead>
                      @foreach ($dataA as $da )
                        <tr>
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $da->name }}</td>
                                <td>{{ $da->email }}</td>
                                <td>
                                    <a href="{{ route('pengguna.edit', ['id' => $da->id]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('pengguna.hapus', ['id' => $da->id]) }}" class="btn btn-danger" onclick="return confirm('Anda yakin ?')">Hapus</a>
                                </td>
                            </tbody>
                        </tr>
                      @endforeach
                   </table>
                        <table class="table table-hover">
                   <h4>Petugas</h4>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Data</th>
                      </tr>
                    </thead>
                      @foreach ($dataP as $dp )
                        <tr>
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dp->name }}</td>
                                <td>{{ $dp->email }}</td>
                                <td>
                                    <a href="{{ route('pengguna.edit', ['id' => $dp->id]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('pengguna.hapus', ['id' => $dp->id]) }}" class="btn btn-danger" onclick="return confirm('Anda yakin ?')">Hapus</a>
                                </td>
                            </tbody>
                        </tr>
                      @endforeach
                        </table>
                    <table class="table table-hover">
                        <h4>Masyarakat</h4>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Data</th>
                      </tr>
                    </thead>
                      @foreach ($dataM as $dm )
                        <tr>
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dm->name }}</td>
                                <td>{{ $dm->email }}</td>
                                <td>
                                    <a href="{{ route('pengguna.edit', ['id' => $dm->id]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('pengguna.hapus', ['id' => $dm->id]) }}" class="btn btn-danger" onclick="return confirm('Anda yakin ?')">Hapus</a>
                                </td>
                            </tbody>
                        </tr>
                      @endforeach
                     </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

