<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Morrow</title>

            <link href="https://fonts.googleapis.com/css2?family=DM+Mono&family=Instrument+Sans:wght@400;500;700&family=Newsreader:ital@1&display=swap" rel="stylesheet">

            @vite(['resources/css/app.css', 'resources/js/app.js'])
        </head>
    <body class="font-sans text-stone-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover bg-center" style="background-image: url('{{ asset('images/fondo_login.png') }}')">
            <div>
                <a href="{{ url('/') }}" class="flex items-center gap-2 font-mono text-lg text-stone-900">
                    @include('profile.partials.morrow-mark', ['class' => 'w-7 h-7 stroke-stone-900 stroke-[6]'])
                    <span>Morrow*</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
