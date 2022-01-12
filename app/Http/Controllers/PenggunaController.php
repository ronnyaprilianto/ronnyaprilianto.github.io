<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class PenggunaController extends Controller
{
    public function index()
    {
        $dataA = User::whereRoleIs('admin')->get();
        $dataP = User::whereRoleIs('petugas')->get();
        $dataM = User::whereRoleIs('masyarakat')->get();
        return view('pengguna.users')->with([
            'dataA' => $dataA,
            'dataP' => $dataP,
            'dataM' => $dataM,
        ]);
    }
    public function tambah(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'nik' => $request['nik'],
            'telp' => $request['telp'],
        ])->attachRole($request['peran']);
        return redirect()->route('pengguna.users');
    }
    public function hapus($id)
    {
        $hapus = User::findOrFail($id);
        $hapus->delete();
        return redirect()->route('pengguna.users')->with('success', 'Data telah dihapus');
    }
    public function edit($id)
    {
        $data = User::findOrfail($id);
        return view('pengguna.edit')->with([
            'data' =>$data
        ]);
    }
    public function prosesedit(Request $request, $id)
    {
        $edit = User::findOrFail($id);
        $edit->name = $request['name'];
        $edit->email = $request['email'];
        if($request['password']){
            $edit->password = $request['password'];
        }
        $edit->nik = $request['nik'];
        $edit->telp = $request['telp'];
        $edit->save();
        $edit->syncRoles([$request['peran']]);
        return redirect()->route('pengguna.users');
    }
}
