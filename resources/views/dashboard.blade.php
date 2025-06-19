@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-black text-white">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2">Dashboard</h1>
            <p class="text-gray-400 text-lg">Selamat datang, {{ auth()->user()->name }}!</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Motorcycle Stats -->
            <div class="bg-gray-900 rounded-2xl p-6 flex flex-col items-center">
                <h3 class="text-lg font-semibold text-white mb-2">Motorcycles</h3>
                <div class="text-3xl font-bold text-white mb-1">{{ $totalMotorcycles }}</div>
                <p class="text-gray-400">Registered motorcycles</p>
            </div>
            <!-- Car Stats -->
            <div class="bg-gray-900 rounded-2xl p-6 flex flex-col items-center">
                <h3 class="text-lg font-semibold text-white mb-2">Cars</h3>
                <div class="text-3xl font-bold text-white mb-1">{{ $totalCars }}</div>
                <p class="text-gray-400">Registered cars</p>
            </div>
            <!-- Latest Vehicle -->
            <div class="bg-gray-900 rounded-2xl p-6 flex flex-col items-center">
                <h3 class="text-lg font-semibold text-white mb-2">Latest Entry</h3>
                @if($latestVehicle)
                    <div class="text-white font-semibold">{{ $latestVehicle->license_plate }}</div>
                    <div class="text-sm text-gray-400">{{ ucfirst($latestVehicle->vehicle_type) }} - {{ $latestVehicle->brand }} {{ $latestVehicle->model }}</div>
                @else
                    <p class="text-gray-400">No vehicles registered yet</p>
                @endif
            </div>
        </div>
        @if($weatherData)
        <div class="bg-gray-900 rounded-2xl p-8 flex flex-col items-center max-w-md mx-auto mb-8">
            <h3 class="text-xl font-semibold text-white mb-1">Bandung</h3>
            <p class="text-gray-400">Current Weather</p>
            <img src="{{ $weatherData['current']['condition']['icon'] }}" alt="Weather icon" class="w-16 h-16 my-2">
            <div class="flex items-end space-x-2">
                <div class="text-5xl font-bold">{{ $weatherData['current']['temp_c'] }}°</div>
                <div class="text-gray-400 mb-2">C</div>
            </div>
            <p class="text-gray-300 mt-2">{{ $weatherData['current']['condition']['text'] }}</p>
        </div>
        @endif
        <div class="flex justify-end">
            <a href="{{ route('vehicles.manage') }}" class="inline-flex items-center px-8 py-4 bg-yellow-400 text-black font-semibold rounded-xl hover:bg-yellow-300 transition-colors">
                Atur Kendaraan
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </main>
</div>
@endsection 