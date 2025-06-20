@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-black text-white">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Success Message -->
        @if(session('success'))
        <div id="successAlert" class="mb-4 bg-green-900 border border-green-500 text-green-300 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <button onclick="document.getElementById('successAlert').remove()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-300" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </button>
        </div>
        @endif

        <!-- Error Message -->
        @if($errors->any())
        <div id="errorAlert" class="mb-4 bg-red-900 border border-red-500 text-red-300 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button onclick="document.getElementById('errorAlert').remove()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-300" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </button>
        </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-semibold text-white">Kendaraan</h1>
                <p class="text-gray-400 mt-1">Daftar seluruh kendaraan yang terdaftar di sistem.</p>
            </div>
            <button onclick="document.getElementById('addVehicleModal').classList.remove('hidden')" 
                    class="bg-yellow-400 text-black px-4 py-2 rounded-lg hover:bg-yellow-300">
                Tambah Kendaraan
            </button>
        </div>

        <!-- Users Table -->
        <div class="bg-gray-900 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-800 text-white">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Plat Nomor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Merk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Model</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Warna</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nama Mahasiswa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">NIM</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Tipe Kendaraan</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach($vehicles as $vehicle)
                    <tr class="hover:bg-gray-800 vehicle-row text-white">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $vehicle->license_plate }}</td>
                        <td class="px-6 py-4">{{ $vehicle->brand }}</td>
                        <td class="px-6 py-4">{{ $vehicle->model }}</td>
                        <td class="px-6 py-4">{{ $vehicle->color }}</td>
                        <td class="px-6 py-4">{{ $vehicle->student_name }}</td>
                        <td class="px-6 py-4">{{ $vehicle->student_id }}</td>
                        <td class="px-6 py-4">{{ ucfirst($vehicle->vehicle_type) }}</td>
                        <td class="px-6 py-4 text-right text-sm font-medium space-x-3">
                            <button onclick="editVehicle({{ $vehicle->id }})" class="text-purple-400 hover:text-purple-300">Edit</button>
                            <button onclick="deleteVehicle({{ $vehicle->id }})" class="text-gray-400 hover:text-gray-300">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Add Vehicle Modal -->
    <div id="addVehicleModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-gray-900 rounded-lg p-8 max-w-md w-full">
            <h3 class="text-xl font-bold text-white mb-4">Add New Vehicle</h3>
            <form action="{{ route('vehicles.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Student Name</label>
                        <input type="text" name="student_name" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Student ID</label>
                        <input type="text" name="student_id" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">License Plate</label>
                        <input type="text" name="license_plate" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Brand</label>
                        <input type="text" name="brand" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Model</label>
                        <input type="text" name="model" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Color</label>
                        <input type="text" name="color" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Vehicle Type</label>
                        <select name="vehicle_type" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="car">Car</option>
                            <option value="motorcycle">Motorcycle</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="document.getElementById('addVehicleModal').classList.add('hidden')"
                            class="px-4 py-2 border border-gray-600 rounded-md text-gray-300 hover:bg-gray-800">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-yellow-400 text-black rounded-md hover:bg-yellow-300">
                        Add Vehicle
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Vehicle Modal -->
    <div id="editVehicleModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-gray-900 rounded-lg p-8 max-w-md w-full">
            <h3 class="text-xl font-bold text-white mb-4">Edit Vehicle</h3>
            <form id="editVehicleForm" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Student Name</label>
                        <input type="text" name="student_name" id="edit_student_name" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Student ID</label>
                        <input type="text" name="student_id" id="edit_student_id" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">License Plate</label>
                        <input type="text" name="license_plate" id="edit_license_plate" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Brand</label>
                        <input type="text" name="brand" id="edit_brand" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Model</label>
                        <input type="text" name="model" id="edit_model" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Color</label>
                        <input type="text" name="color" id="edit_color" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300">Vehicle Type</label>
                        <select name="vehicle_type" id="edit_vehicle_type" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-purple-500 focus:ring-purple-500">
                            <option value="car">Car</option>
                            <option value="motorcycle">Motorcycle</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="document.getElementById('editVehicleModal').classList.add('hidden')"
                            class="px-4 py-2 border border-gray-600 rounded-md text-gray-300 hover:bg-gray-800">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-yellow-400 text-black rounded-md hover:bg-yellow-300">
                        Update Vehicle
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteConfirmModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-gray-900 rounded-lg p-8 max-w-md w-full">
            <h3 class="text-xl font-bold text-white mb-4">Confirm Delete</h3>
            <p class="text-gray-300 mb-6">Are you sure you want to delete this vehicle? This action cannot be undone.</p>
            <form id="deleteVehicleForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="document.getElementById('deleteConfirmModal').classList.add('hidden')"
                            class="px-4 py-2 border border-gray-600 rounded-md text-gray-300 hover:bg-gray-800">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    function toggleProfileMenu() {
        const menu = document.getElementById('profileMenu');
        menu.classList.toggle('hidden');
    }

    // Close the profile menu when clicking outside
    window.addEventListener('click', function(e) {
        const menu = document.getElementById('profileMenu');
        const profileButton = e.target.closest('button');
        if (!profileButton && !menu.classList.contains('hidden')) {
            menu.classList.add('hidden');
        }
    });

    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function(e) {
        const searchValue = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('.vehicle-row');

        rows.forEach(row => {
            const studentId = row.querySelector('.student-id').textContent.toLowerCase();
            const vehicleNumber = row.querySelector('.vehicle-number').textContent.toLowerCase();
            
            if (studentId.includes(searchValue) || vehicleNumber.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    async function editVehicle(id) {
        try {
            const response = await fetch(`/vehicles/${id}/edit`);
            const vehicle = await response.json();
            
            // Populate the edit form
            document.getElementById('edit_student_name').value = vehicle.student_name;
            document.getElementById('edit_student_id').value = vehicle.student_id;
            document.getElementById('edit_license_plate').value = vehicle.license_plate;
            document.getElementById('edit_brand').value = vehicle.brand;
            document.getElementById('edit_model').value = vehicle.model;
            document.getElementById('edit_color').value = vehicle.color;
            document.getElementById('edit_vehicle_type').value = vehicle.vehicle_type;
            
            // Set the form action
            document.getElementById('editVehicleForm').action = `/vehicles/${id}`;
            
            // Show the modal
            document.getElementById('editVehicleModal').classList.remove('hidden');
        } catch (error) {
            console.error('Error:', error);
        }
    }

    function deleteVehicle(id) {
        document.getElementById('deleteVehicleForm').action = `/vehicles/${id}`;
        document.getElementById('deleteConfirmModal').classList.remove('hidden');
    }
</script> 