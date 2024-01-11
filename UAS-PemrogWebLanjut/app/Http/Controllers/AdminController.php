<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::pluck('nama');
        $jabatan = Jabatan::pluck('nama_jabatan');
        $absensi = Absensi::pluck('nama_karyawan');
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.dashboard', compact('notif', 'karyawan', 'jabatan', 'absensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
