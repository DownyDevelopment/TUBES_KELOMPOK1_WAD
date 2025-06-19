@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold">Edit Feedback</h2>
        </div>
        <a href="{{ route('feedback.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">Batal</a>
    </div>
    <div class="bg-gray-900 rounded-lg p-8">
        <form action="{{ route('feedback.update', $feedback) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="subject" class="block text-gray-300 font-medium mb-2">Subjek</label>
                <input type="text" class="w-full px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" id="subject" name="subject" required value="{{ old('subject', $feedback->subject) }}">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-300 font-medium mb-2">Pesan</label>
                <textarea class="w-full px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" id="message" name="message" rows="4" required>{{ old('message', $feedback->message) }}</textarea>
            </div>
            <div class="mb-6">
                <label for="rating" class="block text-gray-300 font-medium mb-2">Rating (Opsional)</label>
                <select class="w-full px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" id="rating" name="rating">
                    <option value="">Pilih Rating</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating', $feedback->rating) == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="flex gap-3">
                <button type="submit" class="bg-yellow-400 text-black font-semibold px-6 py-2 rounded hover:bg-yellow-300 transition">Update</button>
                <a href="{{ route('feedback.index') }}" class="bg-gray-700 text-white px-6 py-2 rounded hover:bg-gray-600 transition">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection 