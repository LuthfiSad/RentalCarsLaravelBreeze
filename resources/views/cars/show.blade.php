<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Car Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col items-center mb-8">
                        <img src="{{ asset($car->image ? 'storage/' . $car->image : 'default.png') }}" alt="{{ $car->name }}" class="w-full max-w-md h-auto rounded-lg shadow-lg object-cover mb-6">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $car->name }}</h3>
                        <p class="text-lg text-gray-500 dark:text-gray-400">{{ $car->model }}</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Year</label>
                            <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $car->year }}</p>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">License Plate</label>
                            <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $car->license_plate }}</p>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rental Price per Day</label>
                            <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ number_format($car->rental_price_per_day, 0, ',', '.') }} IDR</p>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <span class="{{ $car->status === 'available' ? 'bg-green-600' : 'bg-red-600' }} mt-1  px-5 text-lg font-semibold text-center rounded-md">{{ $car->status }}</span>
                        </div>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md mb-8">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <p class="mt-1 text-lg text-gray-500 dark:text-gray-400">{{ $car->description }}</p>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ route('cars.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
