@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold">Feedback Pengguna</h2>
            <div class="text-gray-400">Daftar semua feedback dari pengguna.</div>
        </div>
        <a href="{{ route('feedback.create') }}" class="bg-yellow-400 text-black font-semibold px-6 py-2 rounded-lg hover:bg-yellow-300 transition">Kirim Feedback</a>
    </div>
    <div class="bg-gray-900 rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-800">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Pengguna</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Subjek</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Rating</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                @forelse($feedbacks as $feedback)
                    <tr>
                        <td class="px-6 py-4">{{ $feedback->id }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $feedback->user->name ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $feedback->subject }}</td>
                        <td class="px-6 py-4">
                            @if($feedback->rating)
                                @for($i = 0; $i < $feedback->rating; $i++)
                                    <span class="text-yellow-400">&#9733;</span>
                                @endfor
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $feedback->created_at->timezone('Asia/Jakarta')->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex gap-2 justify-end">
                                <a href="{{ route('feedback.edit', $feedback) }}" class="bg-yellow-400 text-black font-semibold px-4 py-2 rounded hover:bg-yellow-300 transition">Edit</a>
                                <form action="{{ route('feedback.destroy', $feedback) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus feedback ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white font-semibold px-4 py-2 rounded hover:bg-red-500 transition">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-400">Belum ada feedback.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 