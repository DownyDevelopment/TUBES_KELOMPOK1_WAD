@extends('layouts.app')
@section('content')
<div class="p-8 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Mahasiswa</h1>
    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $mahasiswa->nama }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>NIM</label>
            <input type="text" name="nim" value="{{ $mahasiswa->nim }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="{{ $mahasiswa->jurusan }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ $mahasiswa->alamat }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ $mahasiswa->no_hp }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="ml-2">Batal</a>
    </form>
</div>
@endsection 