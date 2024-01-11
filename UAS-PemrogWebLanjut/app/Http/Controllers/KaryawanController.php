<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.karyawan.index', compact('karyawan', 'notif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataJabatan = Jabatan::pluck('nama_jabatan');
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.karyawan.tambah', compact('dataJabatan', 'notif'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'no_rekening' => 'required',
        ]);

        if ($validasi->fails()) {
            return back()->withErrors($validasi);
        }

        $data['nama'] = $request->nama;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tgl_lahir'] = $request->tgl_lahir;
        $data['alamat'] = $request->alamat;
        $data['jabatan'] = $request->jabatan;
        $data['no_rekening'] = $request->no_rekening;

        Karyawan::create($data);
        return redirect()->route('karyawan');
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
        $data = Karyawan::find($id);
        $dataJabatan = Jabatan::pluck('nama_jabatan');
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.karyawan.ubah', compact('data', 'dataJabatan', 'notif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'no_rekening' => 'required',
        ]);

        if ($validasi->fails()) {
            return back()->withErrors($validasi);
        }

        $data['nama'] = $request->nama;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tgl_lahir'] = $request->tgl_lahir;
        $data['alamat'] = $request->alamat;
        $data['jabatan'] = $request->jabatan;
        $data['no_rekening'] = $request->no_rekening;
        $data['updated_at'] = now();

        Karyawan::whereId($id)->update($data);
        return redirect()->route('karyawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $data = Karyawan::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('karyawan');
    }
}
