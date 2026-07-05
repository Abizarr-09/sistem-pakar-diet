<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manajemen Jenis Diet</h2>
            <a href="{{ route('admin.diets.create') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 text-sm font-medium">+ Tambah Diet</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-6 rounded">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">{{ session('error') }}</div>
            @endif

            <div class="grid gap-6">
                @foreach ($diets as $diet)
                    <div class="bg-white overflow-hidden shadow-lg rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">{{ $diet->name }}</h3>
                                    <p class="text-sm text-gray-500 mt-1">{{ Str::limit($diet->description, 120) }}</p>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-medium">{{ $diet->diseases_count }} penyakit</span>
                            </div>
                            <div class="mt-4 flex gap-3">
                                <a href="{{ route('admin.diets.edit', $diet) }}" class="text-emerald-600 hover:text-emerald-800 font-medium text-sm">Edit</a>
                                @if ($diet->diseases_count == 0)
                                    <form action="{{ route('admin.diets.destroy', $diet) }}" method="POST" class="inline" onsubmit="return confirm('Hapus diet ini?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800 font-medium text-sm">Hapus</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
