<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-lg rounded-xl">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Pemeriksaan</p>
                                <p class="text-2xl font-bold text-gray-900">{{ Auth::user()->diagnoses->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg rounded-xl">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Jenis Diet</p>
                                <p class="text-2xl font-bold text-gray-900">5</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg rounded-xl">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Penyakit</p>
                                <p class="text-2xl font-bold text-gray-900">11</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg rounded-xl">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Metode</p>
                                <p class="text-2xl font-bold text-gray-900">Forward Chaining</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}!</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Sistem Pakar Penentuan Jenis Diet ini membantu Anda menentukan jenis diet yang tepat berdasarkan penyakit khusus yang Anda derita.
                        </p>
                        <div class="mt-6 space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-emerald-100 rounded-full flex items-center justify-center mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm text-gray-600">Pilih penyakit yang Anda derita dari 11 penyakit yang tersedia</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-emerald-100 rounded-full flex items-center justify-center mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm text-gray-600">Sistem akan memproses dengan metode Forward Chaining berbasis bobot prioritas</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-emerald-100 rounded-full flex items-center justify-center mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm text-gray-600">Dapatkan rekomendasi diet, pantangan, dan penjelasan lengkap</p>
                            </div>
                        </div>
                        <div class="mt-8">
                            <a href="{{ route('diagnosis.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg font-semibold text-white hover:from-emerald-600 hover:to-teal-700 transition-all duration-200 shadow-md">
                                Mulai Cek Jenis Diet
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Tentang Sistem</h3>
                        <div class="space-y-4">
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                                <h4 class="text-sm font-semibold text-gray-700 mb-2">Forward Chaining</h4>
                                <p class="text-sm text-gray-600">Metode inferensi yang memulai penalaran dari fakta (penyakit terpilih) menuju kesimpulan (jenis diet). Menggunakan skala prioritas bobot untuk menentukan solusi terbaik.</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                                <h4 class="text-sm font-semibold text-gray-700 mb-2">Skala Prioritas Bobot</h4>
                                <p class="text-sm text-gray-600">Setiap penyakit memiliki bobot prioritas. Jika Anda memiliki lebih dari 1 penyakit, penyakit dengan bobot tertinggi akan menjadi penentu utama jenis diet yang direkomendasikan.</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                                <h4 class="text-sm font-semibold text-gray-700 mb-2">5 Jenis Diet</h4>
                                <p class="text-sm text-gray-600">Sistem menyediakan 5 jenis diet: Jantung, DM (Diabetes Melitus), Rendah Purin, Rendah Protein dan Rendah Garam — masing-masing dengan penjelasan dan pantangan makanan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
