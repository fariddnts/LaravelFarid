<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts via Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 min-h-screen flex flex-col items-center justify-center p-6 lg:p-8">

        <!-- Header / Navigasi -->
        <header class="w-full max-w-4xl mb-6">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-3">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="px-4 py-2 text-sm font-medium border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition"
                        >
                            Home
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="px-4 py-2 text-sm font-medium bg-red-600 text-white rounded-lg hover:bg-red-700 transition"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Konten Utama -->
        <main class="w-full max-w-4xl bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-8 lg:p-12">
            <h1 class="text-2xl font-bold mb-4">Selamat Datang!</h1>
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                Silakan pilih menu di bawah ini untuk mengakses informasi data mahasiswa.
            </p>

            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600 flex items-center justify-between">
                <div>
                    <h2 class="font-semibold text-base">Data Mahasiswa</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Lihat seluruh informasi dan rincian data mahasiswa.</p>
                </div>
                <a
                    href="{{ route('mahasiswa.show') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition"
                >

                </a>
            </div>
        </main>

    </body>
</html>
