<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Morrow</title>

        <link href="https://fonts.googleapis.com/css2?family=DM+Mono&family=Instrument+Sans:wght@400;500;700&family=Newsreader:ital@1&display=swap" rel="stylesheet">

        @vite(['resources/css/landing.css', 'resources/js/app.js'])
    </head>
<body class="landing">

    <header>
        <a class="logo" href="{{ url('/') }}">
            @include('profile.partials.morrow-mark', ['class' => 'logo-icon'])
            <span>Morrow*</span>
        </a>

        <nav>
            <a class="button button-light" href="{{ route('login') }}">login</a>
            <a class="button button-dark" href="{{ route('register') }}">register</a>
        </nav>
    </header>

    <main>
        @include('profile.partials.morrow-mark', ['class' => 'hero-icon'])

        <h1>
            <span class="title">Life, all in one place.</span>
            <span class="title-cursive">Always ahead.</span>
        </h1>

        <p class="phrase">
            A shared rhythm for you, your people,<br>
            your pets, and your home.
        </p>
    </main>

    <footer>Your days, thoughtfully arranged.</footer>

</body>
</html>
