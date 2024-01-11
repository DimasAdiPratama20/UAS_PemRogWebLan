<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $role = ['Admin', 'Biasa'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.user.index', compact('data', 'notif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nama = Karyawan::pluck('nama');
        $role = $this->role;
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.user.tambah', compact('role', 'nama', 'notif'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        if ($validasi->fails()) {
            return back()->withErrors($validasi);
        }

        $data['username'] = $request->username;
        $data['name'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['role'] = $request->role;
        $data['email_verified_at'] = now();

        User::create($data);
        return redirect()->route('user');
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
        $data = User::find($id);
        $nama = Karyawan::pluck('nama');
        $role = $this->role;
        $notif = Gaji::where('status', '=', 'Di Proses')->get();
        return view('admin.user.ubah', compact('data', 'nama', 'role', 'notif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        if ($validasi->fails()) {
            return back()->withErrors($validasi);
        }

        $data['username'] = $request->username;
        $data['name'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['role'] = $request->role;
        $data['updated_at'] = now();

        User::whereId($id)->update($data);
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $data = User::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('user');
    }
}
