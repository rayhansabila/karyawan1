<?php

namespace App\Http\Controllers;

use App\Models\Karyawan; // Gunakan nama model dengan huruf kapital
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Tambahkan untuk aturan validasi update

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all(); // Ambil semua data karyawan

        return view('karyawan.index', ['karyawan' => $karyawan]);
    }

    public function tambah()
    {
        return view('karyawan.form');
    }

    public function simpan(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawan,email',
            'alamat' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|date',
            'posisi' => 'required|string|max:255',
        ], [
            'email.unique' => 'Email sudah digunakan. Silakan gunakan email lain.',
        ]);

        // Simpan data
        Karyawan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'posisi' => $request->posisi,
        ]);

        return redirect()->route('karyawan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id); // Ambil data karyawan berdasarkan ID

        return view('karyawan.form', ['karyawan' => $karyawan]);
    }

    public function update($id, Request $request)
    {
        // Ambil data karyawan berdasarkan ID
        $karyawan = Karyawan::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('karyawan')->ignore($karyawan->id)],
            'alamat' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|date',
            'posisi' => 'required|string|max:255',
        ], [
            'email.unique' => 'Email sudah digunakan. Silakan gunakan email lain.',
        ]);

        // Perbarui data karyawan
        $karyawan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'posisi' => $request->posisi,
            'divisi' => $request->divisi,
        ]);

        return redirect()->route('karyawan');
    }

    public function hapus($id)
    {
        // Hapus data karyawan berdasarkan ID
        Karyawan::findOrFail($id)->delete();

        return redirect()->route('karyawan');
    }
}
