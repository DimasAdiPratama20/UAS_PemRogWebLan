<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserBiasaController extends Controller
{
    public $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    public function index()
    {
        return view('biasa.index');
    }

    public function gaji()
    {
        $nama = Auth::user()->name;
        $data = Gaji::where('nama', '=', $nama)->get();
        return view('biasa.gaji', compact('data'));
    }

    public function create()
    {
        $bulan = $this->bulan;
        return view('biasa.create', compact('bulan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        $nama = Auth::user()->name;
        $jabatan = Karyawan::where('nama', $nama)->first()->jabatan;

        $absensi = Absensi::where('nama_karyawan', $nama)
            ->where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->first();

        if (!$absensi) {
            return redirect()->back()->with('gagal', "data absensi pada $request->bulan $request->tahun tidak ditemukan");
        }

        $total_hadir = $absensi->hadir + $absensi->izin + $absensi->alfa;
        $denda_per_alfa = 100000;
        $total_denda_alfa = $absensi->alfa * $denda_per_alfa;
        $gaji = Jabatan::where('nama_jabatan', $jabatan)->first()->nominal_gaji;
        $total_gaji = ($gaji * $absensi->hadir) - ($total_denda_alfa);

        $data['nama'] = $nama;
        $data['jabatan'] = $jabatan;
        $data['bulan'] = $request->bulan;
        $data['tahun'] = $request->tahun;
        $data['total_hadir'] = $total_hadir;
        $data['total_gaji'] = $total_gaji;
        $data['status'] = 'Di Proses';

        Gaji::create($data);

        return redirect()->route('karyawan.gaji');
    }

    public function cetak(Request $request, $id)
    {
        $tanggalHariIni = Carbon::now()->toDateString();
        $tanggalHariIni = Carbon::now()->format('d-m-Y');
        $nama = Auth::user()->name;
        $jabatan = Karyawan::where('nama', $nama)->first()->jabatan;
        $bulan = Gaji::where('id', $id)->first()->bulan;
        $tahun = Gaji::where('id', $id)->first()->tahun;
        $absensi = Absensi::where('nama_karyawan', $nama)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->first();
        $hadir = $absensi->hadir;
        $izin = $absensi->izin;
        $alfa = $absensi->alfa;
        $total_hadir = $hadir - $izin - $alfa;
        $norek = Karyawan::where('nama', $nama)->first()->no_rekening;
        $dataTabel = Gaji::whereId($id)->get();
        return view('biasa.cetakslip', compact('tanggalHariIni', 'nama', 'jabatan', 'bulan', 'tahun', 'hadir', 'izin', 'alfa', 'total_hadir', 'norek', 'dataTabel'));
    }
}
