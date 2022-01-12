<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $data = Pengaduan::where('user_id', Auth::id())->get();
        return view('pengaduan.index')->with([
            'data' => $data
        ]);
    }
    public function simpan(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'laporan' => 'required',
            'foto' => 'mimes:png,jpg'
        ],[
            'laporan.required' => 'Judul dan Laporan harus Diisi !!'
        ]);
        $namafoto = time().".".$request->foto->extension();
        $request->foto->move(public_path('foto'), $namafoto);
        $simpan = new Pengaduan();
        $simpan->tgl_pengaduan = date('Y-m-d');
        $simpan->judul = $request->judul;
        $simpan->isi_laporan = $request->laporan;
        $simpan->user_id = Auth::id();
        $simpan->foto = $namafoto;
        $simpan->status = 'Belum ada Tanggapan';
        $simpan->save();

        return redirect()->back();
    }
    public function detail($id)
    {
        $data = Pengaduan::find($id);
        return view('pengaduan.detail')->with([
            'data' => $data
        ]);
    }
}
