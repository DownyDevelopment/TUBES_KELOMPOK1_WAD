@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold">Kirim Feedback Baru</h2>
            <div class="text-gray-400">Gunakan formulir ini untuk mengirimkan feedback Anda.</div>
        </div>
        <a href="{{ route('feedback.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">Kembali ke Daftar Feedback</a>
    </div>
    <div class="bg-gray-900 rounded-lg p-8">
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="subject" class="block text-gray-300 font-medium mb-2">Subjek</label>
                <input type="text" class="w-full px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" id="subject" name="subject" required value="{{ old('subject') }}">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-300 font-medium mb-2">Pesan</label>
                <textarea class="w-full px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
            </div>
            <div class="mb-6">
                <label for="rating" class="block text-gray-300 font-medium mb-2">Rating (Opsional)</label>
                <select class="w-full px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" id="rating" name="rating">
                    <option value="">Pilih Rating</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="w-full bg-yellow-400 text-black font-semibold py-3 rounded-lg hover:bg-yellow-300 transition">Kirim Feedback</button>
        </form>
    </div>
</div>
@endsection 