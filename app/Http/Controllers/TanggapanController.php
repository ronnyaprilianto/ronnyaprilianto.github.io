<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function index()
    {
        $data = Pengaduan::all();
        return view('tanggapan.verif')->with([
            'data' => $data
        ]);
    }
    public function detail($id)
    {
        $data = Pengaduan::findOrFail($id);
        $datatanggapan = Tanggapan::where('pengaduan_id', $data->id)->first();
        return view('tanggapan.detail')->with([
            'data' => $data,
            'datatanggapan' => $datatanggapan,
        ]);
    }
    public function simpan(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request['status'];
        $pengaduan->save();

        $tanggapan = Tanggapan::firstOrNew(['pengaduan_id'=>$pengaduan->id]);
        $tanggapan->tgl_pengaduan = date('Y-m-d');
        $tanggapan->judul = $request['judul'];
        $tanggapan->tanggapan = $request['tanggapan'];
        $tanggapan->user_id = Auth::id();
        $tanggapan->save();
        return redirect()->route('tanggapan.verif');
    }
}
