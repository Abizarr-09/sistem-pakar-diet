<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cek Jenis Diet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-900">Sistem Pakar Penentuan Jenis Diet</h3>
                        <p class="mt-2 text-gray-600">Masukkan data pasien dan pilih penyakit yang diderita untuk mendapatkan rekomendasi diet</p>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                            <p class="font-bold">Harap periksa kembali</p>
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('diagnosis.process') }}" method="POST" id="diagnosisForm">
                        @csrf

                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border border-blue-100 rounded-xl p-6 mb-8">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Identitas Pasien
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">No. Rekam Medis <span class="text-red-500">*</span></label>
                                    <input type="text" name="rm_number" value="{{ old('rm_number') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" placeholder="RM-001" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pasien <span class="text-red-500">*</span></label>
                                    <input type="text" name="patient_name" value="{{ old('patient_name') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" placeholder="Nama lengkap" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Usia <span class="text-red-500">*</span></label>
                                    <input type="number" name="patient_age" value="{{ old('patient_age') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" placeholder="0" min="0" max="150" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin <span class="text-red-500">*</span></label>
                                    <select name="patient_gender" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500" required>
                                        <option value="">Pilih</option>
                                        <option value="L" {{ old('patient_gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('patient_gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Penyakit yang diderita pasien <span class="text-red-500">*</span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($diseases as $disease)
                                    @php
                                        $colors = ['from-emerald-500 to-teal-600', 'from-blue-500 to-cyan-600', 'from-violet-500 to-purple-600', 'from-rose-500 to-pink-600', 'from-amber-500 to-orange-600', 'from-sky-500 to-indigo-600', 'from-red-500 to-rose-600', 'from-green-500 to-emerald-600', 'from-teal-500 to-cyan-600', 'from-fuchsia-500 to-violet-600', 'from-orange-500 to-amber-600', 'from-indigo-500 to-blue-600'];
                                        $gradient = $colors[$loop->index % count($colors)];
                                    @endphp
                                    <label class="relative flex items-center p-4 rounded-xl cursor-pointer transition-all duration-200 border-2 border-gray-200 hover:border-gray-400 has-[:checked]:border-transparent has-[:checked]:shadow-lg group" for="disease_{{ $disease->id }}">
                                        <input type="checkbox" name="diseases[]" value="{{ $disease->id }}" id="disease_{{ $disease->id }}" class="peer hidden">
                                        <div class="absolute inset-0 rounded-xl bg-gradient-to-br {{ $gradient }} opacity-0 peer-checked:opacity-100 transition-opacity duration-200"></div>
                                        <div class="relative z-10 flex items-center w-full">
                                            <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-white bg-opacity-20 peer-checked:bg-white peer-checked:bg-opacity-30">
                                                <svg class="w-5 h-5 text-gray-500 peer-checked:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-semibold text-gray-800 peer-checked:text-white">{{ $disease->name }}</p>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex justify-center mt-8">
                            <button type="submit" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-emerald-500 to-teal-600 border border-transparent rounded-xl font-semibold text-white hover:from-emerald-600 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition-all duration-200 shadow-lg hover:shadow-xl text-lg">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Dapatkan Rekomendasi Diet
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-8 bg-gradient-to-br from-emerald-50 to-teal-50 overflow-hidden shadow-xl sm:rounded-lg border border-emerald-100">
                <div class="p-6 lg:p-8">
                    <h4 class="text-lg font-semibold text-emerald-800 mb-4"> Cara Kerja Sistem</h4>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-emerald-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-emerald-700 font-bold text-lg">1</span>
                            </div>
                            <p class="text-sm text-emerald-700">Input data pasien</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-emerald-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-emerald-700 font-bold text-lg">2</span>
                            </div>
                            <p class="text-sm text-emerald-700">Pilih penyakit yang diderita</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-emerald-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-emerald-700 font-bold text-lg">3</span>
                            </div>
                            <p class="text-sm text-emerald-700">Forward chaining berdasarkan bobot</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-emerald-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-emerald-700 font-bold text-lg">4</span>
                            </div>
                            <p class="text-sm text-emerald-700">Dapatkan rekomendasi diet + cetak</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
