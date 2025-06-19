@extends('layouts.app')
@section('content')
<div class="p-8 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah Mahasiswa</h1>
    <form action="{{ route('mahasiswa.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Nama</label>
            <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>NIM</label>
            <input type="text" name="nim" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>Alamat</label>
            <input type="text" name="alamat" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>No HP</label>
            <input type="text" name="no_hp" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="ml-2">Batal</a>
    </form>
</div>
@endsection 