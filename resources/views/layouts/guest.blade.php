<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>NutrimED - Sistem Pakar Penentuan Jenis Diet</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Figtree', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        },
                    }
                }
            }
        </script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50">
            <div class="mb-6">
                <a href="/" class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200 overflow-hidden">
                        <x-nutrimed-logo :iconOnly="true" size="w-full h-full" class="rounded-2xl" />
                    </div>
                    <span class="mt-2 text-lg font-bold text-emerald-700 tracking-wide">Nutrim<span class="text-emerald-500">ED</span></span>
                    <span class="text-xs text-gray-500 -mt-0.5">Sistem Pakar Penentuan Diet</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md px-8 py-8 bg-white shadow-xl shadow-emerald-100/50 rounded-2xl border border-emerald-50">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
