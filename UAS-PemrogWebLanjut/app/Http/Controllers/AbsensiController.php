<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    public $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Absensi::all();
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.absensi.index', compact('data', 'notif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataKaryawan = Karyawan::pluck('nama');
        $bulan = $this->bulan;
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.absensi.tambah', compact('dataKaryawan', 'bulan', 'notif'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'hadir' => 'required',
            'izin' => 'required',
            'alfa' => 'required',
        ]);

        if ($validasi->fails()) {
            return back()->withErrors($validasi);
        }

        $dataValid = $validasi->validated();

        if ($dataValid['hadir'] + $dataValid['izin'] + $dataValid['alfa'] > 31) {
            return redirect()->back()->withInput();
        }

        if ($request->bulan == 'Februari' && $dataValid['hadir'] + $dataValid['izin'] + $dataValid['alfa'] > 29) {
            return redirect()->back()->withInput();
        }

        $karyawan = Karyawan::where('nama', '=', $request->nama)->first();

        $data['nama_karyawan'] = $request->nama;
        $data['jabatan'] = $karyawan->jabatan;
        $data['bulan'] = $request->bulan;
        $data['tahun'] = $request->tahun;
        $data['hadir'] = $request->hadir;
        $data['izin'] = $request->izin;
        $data['alfa'] = $request->alfa;


        Absensi::create($data);

        return redirect()->route('absensi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $absensi = Absensi::find($id);
        $dataKaryawan = Karyawan::pluck('nama');
        $bulan = $this->bulan;
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.absensi.ubah', compact('absensi', 'bulan', 'dataKaryawan', 'notif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'hadir' => 'required',
            'izin' => 'required',
            'alfa' => 'required',
        ]);

        if ($validasi->fails()) {
            return back()->withErrors($validasi);
        }

        $dataValid = $validasi->validated();

        if ($dataValid['hadir'] + $dataValid['izin'] + $dataValid['alfa'] > 31) {
            return redirect()->back()->withInput();
        }

        if ($request->bulan == 'Februari' && $dataValid['hadir'] + $dataValid['izin'] + $dataValid['alfa'] > 29) {
            return redirect()->back()->withInput();
        }

        $karyawan = Karyawan::where('nama', '=', $request->nama)->first();

        $data['nama_karyawan'] = $request->nama;
        $data['jabatan'] = $karyawan->jabatan;
        $data['bulan'] = $request->bulan;
        $data['tahun'] = $request->tahun;
        $data['hadir'] = $request->hadir;
        $data['izin'] = $request->izin;
        $data['alfa'] = $request->alfa;
        $data['updated_at'] = now();

        Absensi::whereId($id)->update($data);

        return redirect()->route('absensi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $data = Absensi::find($id);
        if ($data) {
            $data->delete();
        }

        return redirect()->route('absensi');
    }
}
