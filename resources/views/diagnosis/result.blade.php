<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hasil Analisis Diet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-emerald-400 via-emerald-500 to-teal-600 rounded-2xl shadow-2xl overflow-hidden mb-8">
                <div class="p-8 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white bg-opacity-20 rounded-full mb-4">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2">Hasil Analisis Diet</h3>
                    <p class="text-emerald-100 text-lg">{{ $diagnosis->created_at->format('d F Y H:i') }}</p>
                </div>
            </div>

            {{-- Data Pasien --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="p-6 lg:p-8">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Data Pasien
                    </h4>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs text-gray-500">No. Rekam Medis</p>
                            <p class="font-semibold text-gray-800">{{ $diagnosis->patient->rm_number }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs text-gray-500">Nama Pasien</p>
                            <p class="font-semibold text-gray-800">{{ $diagnosis->patient->name }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs text-gray-500">Usia</p>
                            <p class="font-semibold text-gray-800">{{ $diagnosis->patient->age }} tahun</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs text-gray-500">Jenis Kelamin</p>
                            <p class="font-semibold text-gray-800">{{ $diagnosis->patient->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Diet Utama (Primary Diet) --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8 border-t-4 border-emerald-500">
                <div class="p-6 lg:p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-emerald-600 font-medium">Diet Utama</p>
                            <h4 class="text-2xl font-bold text-gray-900">{{ $diagnosis->result_diet_name }}</h4>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed">{{ $diagnosis->result_description }}</p>
                </div>
            </div>

            {{-- Instruksi Modifikasi (Secondary Diet) --}}
            @if ($diagnosis->secondary_diet_instructions)
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8 border-t-4 border-amber-500">
                    <div class="p-6 lg:p-8">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-amber-600 font-medium">Instruksi Modifikasi</p>
                                <h4 class="text-xl font-bold text-gray-900">Diet Penyerta</h4>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mb-3">Pasien terdiagnosis komplikasi, sehingga diet utama perlu dimodifikasi dengan prinsip diet berikut:</p>
                        <ul class="space-y-2">
                            @php $instructions = explode("\n", $diagnosis->secondary_diet_instructions); @endphp
                            @foreach ($instructions as $instruction)
                                @if (trim($instruction))
                                    <li class="flex items-start gap-3 p-3 bg-amber-50 rounded-lg">
                                        <svg class="w-5 h-5 text-amber-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                        <span class="text-gray-700">{{ trim($instruction) }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- Daftar Penyakit Terdeteksi --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="p-6 lg:p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-blue-600 font-medium">Validasi Data</p>
                            <h4 class="text-xl font-bold text-gray-900">Daftar Penyakit Terdeteksi</h4>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mb-4">Ringkasan seluruh penyakit yang dicentang untuk validasi ulang oleh nakes:</p>
                    <div class="overflow-hidden border border-gray-200 rounded-xl">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Penyakit</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Bobot Prioritas</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Asosiasi Diet</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($diagnosis->diseases as $disease)
                                    <tr class="{{ $disease->id === $result['top_disease']['id'] ? 'bg-emerald-50' : 'bg-white' }}">
                                        <td class="px-4 py-3">
                                            <span class="font-medium text-gray-800">{{ $disease->name }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                                @if($disease->weight >= 80) bg-red-100 text-red-800
                                                @elseif($disease->weight >= 60) bg-amber-100 text-amber-800
                                                @else bg-blue-100 text-blue-800 @endif">
                                                {{ $disease->weight }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ $disease->dietType->name }}</td>
                                        <td class="px-4 py-3">
                                            @if ($disease->id === $result['top_disease']['id'])
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                    Prioritas Utama
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01"/>
                                                    </svg>
                                                    Modifikasi
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if (count($diagnosis->diseases) > 1)
                        <div class="mt-4 bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-lg">
                            <div class="flex">
                                <svg class="w-5 h-5 text-amber-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <p class="text-sm font-semibold text-amber-800">Multi-Penyakit Terdeteksi</p>
                                    <p class="text-sm text-amber-700 mt-1">Sistem menggunakan prioritas bobot tertinggi untuk menentukan diet utama. Penyakit dengan bobot lebih rendah menjadi bahan modifikasi.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Pantangan Makanan --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="p-6 lg:p-8">
                    <h5 class="text-lg font-semibold text-red-700 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                        </svg>
                        Pantangan Makanan
                    </h5>
                    <p class="text-gray-600 leading-relaxed">{{ $diagnosis->result_pantangan }}</p>
                </div>
            </div>

            {{-- Explanation Facility --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="p-6 lg:p-8">
                    <h5 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Explanation Facility
                    </h5>
                    <div class="bg-emerald-50 border border-emerald-200 rounded-lg p-4">
                        <p class="text-emerald-800 leading-relaxed">{{ $diagnosis->result_explanation }}</p>
                    </div>
                </div>
            </div>

            {{-- Proses Inferensi Forward Chaining --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="p-6 lg:p-8">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                        Proses Inferensi Forward Chaining
                    </h4>

                    <div class="space-y-4">
                        @foreach ($result['trace'] as $trace)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-xs font-bold shadow-sm">
                                    {{ $trace['step'] }}
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                        <p class="text-sm font-semibold text-gray-800">{{ $trace['action'] }}</p>
                                        <p class="text-sm text-gray-600 mt-1">{{ $trace['detail'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Disclaimer --}}
            <div class="bg-gradient-to-r from-amber-50 to-orange-50 border-l-4 border-amber-500 rounded-lg p-5 mb-8 shadow-sm">
                <div class="flex">
                    <svg class="w-6 h-6 text-amber-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-bold text-amber-900">Disclaimer</p>
                        <p class="text-sm text-amber-800 mt-1 leading-relaxed">
                            Rekomendasi diet ini bersifat umum berdasarkan penyakit utama. Untuk kondisi penyakit kronis tingkat lanjut atau komplikasi parah, harap konsultasikan langsung dengan dokter spesialis gizi klinik.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-between">
                <a href="{{ route('diagnosis.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-100 border border-gray-300 rounded-lg font-semibold text-gray-700 hover:bg-gray-200 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Cek Ulang
                </a>
                <div class="flex gap-3">
                    <a href="{{ route('diagnosis.print', $diagnosis) }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-lg font-semibold text-white hover:from-blue-600 hover:to-cyan-700 transition-all duration-200 shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Cetak Rekomendasi
                    </a>
                    <a href="{{ route('history.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg font-semibold text-white hover:from-emerald-600 hover:to-teal-700 transition-all duration-200 shadow-md">
                        Lihat Riwayat
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
