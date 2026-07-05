<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Pemeriksaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('history.index') }}" class="mb-6">
                <div class="flex gap-3">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan No. RM atau Nama Pasien..." class="flex-1 border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
                    <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 font-medium">Cari</button>
                    @if (request('search'))
                        <a href="{{ route('history.index') }}" class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 font-medium">Reset</a>
                    @endif
                </div>
            </form>

            @if ($diagnoses->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($diagnoses as $diagnosis)
                        <a href="{{ route('diagnosis.result', $diagnosis->id) }}" class="block group">
                            <div class="bg-white overflow-hidden shadow-lg rounded-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-5 py-4">
                                    <div class="flex items-center justify-between">
                                        <h5 class="text-white font-semibold truncate">{{ $diagnosis->result_diet_name }}</h5>
                                        <span class="inline-flex items-center px-2 py-1 bg-white bg-opacity-20 rounded-full text-xs text-white font-medium">
                                            #{{ $diagnosis->id }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <div class="flex items-center text-sm text-gray-500 mb-3">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        {{ $diagnosis->created_at->format('d M Y, H:i') }}
                                    </div>

                                    <div class="mb-3">
                                        <p class="text-xs text-gray-500 mb-1 font-medium">Penyakit terpilih:</p>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($diagnosis->diseases as $disease)
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium 
                                                    @if ($loop->first) bg-amber-100 text-amber-800
                                                    @else bg-gray-100 text-gray-600 @endif">
                                                    {{ $disease->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                        <span class="text-xs text-gray-400">{{ $diagnosis->diseases->count() }} penyakit terdeteksi</span>
                                        <span class="inline-flex items-center text-sm font-semibold text-emerald-600 group-hover:text-emerald-700 transition-colors">
                                            Detail
                                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $diagnoses->links() }}
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Belum Ada Riwayat Pemeriksaan</h3>
                        <p class="text-gray-500 mb-6">Anda belum melakukan pemeriksaan jenis diet. Yuk cek sekarang!</p>
                        <a href="{{ route('diagnosis.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg font-semibold text-white hover:from-emerald-600 hover:to-teal-700 transition-all duration-200 shadow-md">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Cek Jenis Diet Sekarang
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
