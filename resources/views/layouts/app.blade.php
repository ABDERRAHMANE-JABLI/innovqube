<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Réservations Immobilières')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-primary text-white p-4">
        <div class="container mx-auto flex justify-between">
            <div class="flex space-x-4">
                <a href="{{ url('/') }}" class="text-lg font-bold">Accueil</a>
                @auth
                    <a href="{{ url('/reservations') }}" class="text-lg">Mes Réservations</a>
                @endauth
            </div>
            <div>
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-secondary rounded">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-secondary rounded">Se connecter</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>
