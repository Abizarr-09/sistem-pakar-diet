<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ isset($diet) ? 'Edit Jenis Diet' : 'Tambah Jenis Diet' }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form action="{{ isset($diet) ? route('admin.diets.update', $diet) : route('admin.diets.store') }}" method="POST">
                    @csrf
                    @if (isset($diet)) @method('PUT') @endif

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Diet</label>
                        <input type="text" name="name" value="{{ old('name', $diet->name ?? '') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>{{ old('description', $diet->description ?? '') }}</textarea>
                        @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Pantangan Makanan</label>
                        <textarea name="pantangan" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>{{ old('pantangan', $diet->pantangan ?? '') }}</textarea>
                        @error('pantangan') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Explanation Facility</label>
                        <textarea name="explanation" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>{{ old('explanation', $diet->explanation ?? '') }}</textarea>
                        @error('explanation') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <a href="{{ route('admin.diets.index') }}" class="px-4 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200">Batal</a>
                        <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 font-medium">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
