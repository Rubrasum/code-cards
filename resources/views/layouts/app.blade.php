<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Quiz Cards</title>
    <link href="/css/app.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body class="container mt-5 bg-site_primary_color">
    <div>
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @guest
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            <a href="{{ route('registration') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Signup</a>
            @endguest
            @auth
            <form class="inline-block" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="inline-block text-sm text-gray-700 dark:text-gray-500 underline">
                    {{ __('Logout') }}
                </button>
            </form>
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline inline-block">Dashboard</a>
            @endauth
        </div>
    </div>


@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/quizcard.js') }}" defer></script>

</body>

</html>
