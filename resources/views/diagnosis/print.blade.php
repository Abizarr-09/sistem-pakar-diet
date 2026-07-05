<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekomendasi Diet - {{ $diagnosis->patient->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            @page { margin: 1.5cm; }
            body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .no-print { display: none !important; }
            .break-inside { page-break-inside: avoid; }
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans">
    <div class="max-w-3xl mx-auto p-8">

        {{-- Header --}}
        <div class="text-center border-b-2 border-gray-300 pb-4 mb-6">
            <h1 class="text-2xl font-bold text-gray-900">REKOMENDASI DIET PASIEN</h1>
            <p class="text-sm text-gray-500">Sistem Pakar Penentuan Jenis Diet - Instalasi Gizi</p>
            <p class="text-sm text-gray-500">{{ $diagnosis->created_at->format('d F Y H:i') }}</p>
        </div>

        {{-- Identitas Pasien --}}
        <div class="border border-gray-300 rounded-lg p-4 mb-6 break-inside">
            <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wide mb-3">Identitas Pasien</h2>
            <table class="w-full text-sm">
                <tr>
                    <td class="py-1 pr-4 text-gray-500 w-40">No. Rekam Medis</td>
                    <td class="py-1 font-semibold">: {{ $diagnosis->patient->rm_number }}</td>
                </tr>
                <tr>
                    <td class="py-1 pr-4 text-gray-500">Nama Pasien</td>
                    <td class="py-1 font-semibold">: {{ $diagnosis->patient->name }}</td>
                </tr>
                <tr>
                    <td class="py-1 pr-4 text-gray-500">Usia</td>
                    <td class="py-1 font-semibold">: {{ $diagnosis->patient->age }} tahun</td>
                </tr>
                <tr>
                    <td class="py-1 pr-4 text-gray-500">Jenis Kelamin</td>
                    <td class="py-1 font-semibold">: {{ $diagnosis->patient->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td class="py-1 pr-4 text-gray-500">Didiagnosa oleh</td>
                    <td class="py-1 font-semibold">: {{ $diagnosis->user->name }}</td>
                </tr>
            </table>
        </div>

        {{-- Diet Utama --}}
        <div class="border-2 border-emerald-600 rounded-lg p-4 mb-6 break-inside" style="border-color: #059669;">
            <h2 class="text-lg font-bold text-emerald-800">Diet Utama</h2>
            <p class="text-2xl font-bold text-gray-900 mt-2">{{ $diagnosis->result_diet_name }}</p>
            <p class="text-gray-600 mt-2">{{ $diagnosis->result_description }}</p>
        </div>

        {{-- Instruksi Modifikasi --}}
        @if ($diagnosis->secondary_diet_instructions)
            <div class="border border-amber-500 rounded-lg p-4 mb-6 break-inside" style="border-color: #f59e0b;">
                <h2 class="text-base font-bold text-amber-800">Instruksi Modifikasi</h2>
                <p class="text-sm text-gray-500 mt-1 mb-2">Pasien terdiagnosis komplikasi, diet utama perlu dimodifikasi:</p>
                <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                    @php $instructions = explode("\n", $diagnosis->secondary_diet_instructions); @endphp
                    @foreach ($instructions as $instruction)
                        @if (trim($instruction))
                            <li>{{ trim($instruction) }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Daftar Penyakit --}}
        <div class="border border-gray-300 rounded-lg p-4 mb-6 break-inside">
            <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wide mb-3">Daftar Penyakit Terdeteksi</h2>
            <table class="w-full text-sm border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left py-2 px-3 border border-gray-200">Penyakit</th>
                        <th class="text-left py-2 px-3 border border-gray-200">Bobot</th>
                        <th class="text-left py-2 px-3 border border-gray-200">Asosiasi Diet</th>
                        <th class="text-left py-2 px-3 border border-gray-200">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diagnosis->diseases as $disease)
                        <tr>
                            <td class="py-2 px-3 border border-gray-200">{{ $disease->name }}</td>
                            <td class="py-2 px-3 border border-gray-200">{{ $disease->weight }}</td>
                            <td class="py-2 px-3 border border-gray-200">{{ $disease->dietType->name }}</td>
                            <td class="py-2 px-3 border border-gray-200 font-semibold">
                                @if ($disease->id === $result['top_disease']['id'])
                                    Prioritas Utama
                                @else
                                    Modifikasi
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pantangan --}}
        <div class="border border-red-300 rounded-lg p-4 mb-6 break-inside" style="border-color: #fca5a5;">
            <h2 class="text-sm font-bold text-red-800">Pantangan Makanan</h2>
            <p class="text-sm text-gray-700 mt-2">{{ $diagnosis->result_pantangan }}</p>
        </div>

        {{-- Disclaimer --}}
        <div class="border border-gray-300 rounded-lg p-4 mb-6">
            <p class="text-xs text-gray-500 italic">
                Disclaimer: Rekomendasi diet ini bersifat umum berdasarkan analisis sistem pakar. Untuk kondisi penyakit kronis tingkat lanjut atau komplikasi parah, harap konsultasikan langsung dengan dokter spesialis gizi klinik.
            </p>
        </div>

        {{-- Tanda Tangan --}}
        <div class="mt-12 flex justify-end">
            <div class="text-center">
                <p class="text-sm text-gray-500">Dicetak oleh:</p>
                <div class="mt-8 mb-2">
                    <p class="font-semibold text-gray-800">{{ $diagnosis->user->name }}</p>
                    <p class="text-sm text-gray-500">{{ $diagnosis->user->email }}</p>
                </div>
                <p class="text-sm text-gray-500 mt-8">(____________________)</p>
                <p class="text-sm text-gray-500">Tanda Tangan</p>
            </div>
        </div>

        {{-- Tombol Cetak --}}
        <div class="text-center mt-8 no-print">
            <button onclick="window.print()" class="px-8 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 shadow-md">
                Cetak / Print
            </button>
            <a href="{{ route('diagnosis.result', $diagnosis) }}" class="ml-3 px-8 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200">
                Kembali
            </a>
        </div>
    </div>
</body>
</html>
