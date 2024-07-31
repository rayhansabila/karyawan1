@extends('layouts.app')

@section('title', 'Form Karyawan')

@section('contents')
  <form action="{{ isset($karyawan) ? route('karyawan.tambah.update', $karyawan->id) : route('karyawan.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($karyawan) ? 'Form Edit Karyawan' : 'Form Tambah Karyawan' }}</h6>
          </div>
          <div class="card-body">
            <!-- Tampilkan pesan kesalahan validasi -->
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="form-group">
              <label for="nama">Nama Karyawan</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', isset($karyawan) ? $karyawan->nama : '') }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', isset($karyawan) ? $karyawan->email : '') }}" required>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat:</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', isset($karyawan) ? $karyawan->alamat : '') }}" required>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="date" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', isset($karyawan) ? $karyawan->tempat_lahir : '') }}">
            </div>
            <div class="form-group">
                <label for="posisi">Posisi:</label>
                <input type="text" class="form-control" id="posisi" name="posisi" value="{{ old('posisi', isset($karyawan) ? $karyawan->posisi : '') }}" required>
            </div>
            <div class="form-group">
              <label for="divisi">divisi:</label>
              <input type="text" class="form-control" id="divisi" name="divisi" value="{{ old('divisi', isset($karyawan) ? $karyawan->divisi : '') }}" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
