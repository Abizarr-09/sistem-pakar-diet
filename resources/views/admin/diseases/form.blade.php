<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ isset($disease) ? 'Edit Penyakit' : 'Tambah Penyakit' }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form action="{{ isset($disease) ? route('admin.diseases.update', $disease) : route('admin.diseases.store') }}" method="POST">
                    @csrf
                    @if (isset($disease)) @method('PUT') @endif

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Penyakit</label>
                        <input type="text" name="name" value="{{ old('name', $disease->name ?? '') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>{{ old('description', $disease->description ?? '') }}</textarea>
                        @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Bobot Prioritas (1-100)</label>
                            <input type="number" name="weight" min="1" max="100" value="{{ old('weight', $disease->weight ?? '') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>
                            @error('weight') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis Diet Rekomendasi</label>
                            <select name="diet_type_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>
                                <option value="">Pilih Diet</option>
                                @foreach ($diets as $diet)
                                    <option value="{{ $diet->id }}" {{ old('diet_type_id', $disease->diet_type_id ?? '') == $diet->id ? 'selected' : '' }}>{{ $diet->name }}</option>
                                @endforeach
                            </select>
                            @error('diet_type_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <a href="{{ route('admin.diseases.index') }}" class="px-4 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200">Batal</a>
                        <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 font-medium">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
