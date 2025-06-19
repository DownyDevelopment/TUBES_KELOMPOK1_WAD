@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-black text-white">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Data Mahasiswa</h1>
            <a href="{{ route('mahasiswa.create') }}" class="bg-yellow-400 text-black px-4 py-2 rounded-lg hover:bg-yellow-300">Tambah Mahasiswa</a>
        </div>
        <div class="bg-gray-900 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-800">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">NIM</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Jurusan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">No HP</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach($mahasiswas as $mhs)
                    <tr class="hover:bg-gray-800">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $mhs->nama }}</td>
                        <td class="px-6 py-4">{{ $mhs->nim }}</td>
                        <td class="px-6 py-4">{{ $mhs->jurusan }}</td>
                        <td class="px-6 py-4">{{ $mhs->alamat }}</td>
                        <td class="px-6 py-4">{{ $mhs->no_hp }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="bg-yellow-400 text-black px-2 py-1 rounded">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection 