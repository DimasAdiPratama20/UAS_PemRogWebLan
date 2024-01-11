<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $status = ['Di Proses', 'Di Setujui', 'Di Tolak'];
    public function index()
    {
        $status = $this->status;
        $data = Gaji::where('status', '=', $status[0])->get();
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.gaji.index', compact('data', 'notif'));
    }

    public function setujui(Request $request, $id)
    {
        $proses = Gaji::where('id', $id)->update(['status' => 'Di Setujui']);
        if ($proses) {
            return redirect()->route('gaji')->with('setuju', 'Pengajuan di setujui');
        }
    }

    public function tolak(Request $request, $id)
    {
        $proses = Gaji::where('id', $id)->update(['status' => 'Di Tolak']);
        if ($proses) {
            return redirect()->route('gaji');
        }
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
