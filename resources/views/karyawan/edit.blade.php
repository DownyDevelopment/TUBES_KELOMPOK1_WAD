@extends('layouts.app')
@section('content')
<div class="p-8 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Karyawan</h1>
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $karyawan->nama }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>NIP</label>
            <input type="text" name="nip" value="{{ $karyawan->nip }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>Bagian</label>
            <input type="text" name="bagian" value="{{ $karyawan->bagian }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ $karyawan->alamat }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ $karyawan->no_hp }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('karyawan.index') }}" class="ml-2">Batal</a>
    </form>
</div>
@endsection 