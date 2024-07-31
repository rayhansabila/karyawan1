@extends('layouts.app')

@section('title', 'Karyawan')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Karyawan</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('karyawan.tambah') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Posisi</th>
                <th>Divisi</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($karyawan as $row)
              <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->tempat_lahir }}</td>
                <td>{{ $row->posisi }}</td>
                <td>{{ $row->divisi }}</td>
                <td>
                    <a href="{{ route('karyawan.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('karyawan.hapus', $row->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
