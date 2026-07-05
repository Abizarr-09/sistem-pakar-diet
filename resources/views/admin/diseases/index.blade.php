<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manajemen Penyakit</h2>
            <a href="{{ route('admin.diseases.create') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 text-sm font-medium">+ Tambah Penyakit</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-6 rounded">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Penyakit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bobot</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Diet Rekomendasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($diseases as $disease)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-gray-800">{{ $disease->name }}</p>
                                        <p class="text-sm text-gray-500">{{ Str::limit($disease->description, 60) }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium
                                            @if($disease->weight >= 80) bg-red-100 text-red-800
                                            @elseif($disease->weight >= 60) bg-amber-100 text-amber-800
                                            @else bg-blue-100 text-blue-800 @endif">
                                            {{ $disease->weight }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $disease->dietType->name }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.diseases.edit', $disease) }}" class="text-emerald-600 hover:text-emerald-800 font-medium text-sm mr-3">Edit</a>
                                        <form action="{{ route('admin.diseases.destroy', $disease) }}" method="POST" class="inline" onsubmit="return confirm('Hapus penyakit ini?')">
                                            @csrf @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800 font-medium text-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
