<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jabatan::all();
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.jabatan.index', compact('data', 'notif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.jabatan.tambah', compact('notif'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'jabatan' => 'required',
            'gaji' => 'required',
        ]);

        if($validasi->fails()){
            return back()->withErrors($validasi);
        }

        $data['nama_jabatan'] = $request->jabatan;
        $data['nominal_gaji'] = $request->gaji;

        Jabatan::create($data);
        return redirect()->route('jabatan');
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
        $data = Jabatan::find($id);
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.jabatan.ubah', compact('data', 'notif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(),[
            'jabatan' => 'required',
            'gaji' => 'required',
        ]);

        if($validasi->fails()){
            return back()->withErrors($validasi);
        }

        $data['nama_jabatan'] = $request->jabatan;
        $data['nominal_gaji'] = $request->gaji;
        $data['updated_at'] = now();

        Jabatan::whereId($id)->update($data);
        return redirect()->route('jabatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $data = Jabatan::find($id);
        if($data){
            $data->delete();
        }

        return redirect()->route('jabatan');
    }
}
