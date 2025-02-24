@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <h1 class="text-3xl font-bold text-center text-primary mb-6">Liste des Propriétés</h1>

    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-2"> <!-- Simule une row Bootstrap -->
            @foreach($properties as $property)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2 mb-4"> <!-- Simule une col -->
                    <div class="bg-white p-4 shadow rounded overflow-hidden">
                        @if ($property->image)
                            <img src="{{ asset('storage/' . $property->image) }}" class="w-full h-48 object-cover rounded" alt="{{ $property->name }}">
                        @endif
                        <h3 class="text-lg font-bold mt-2">{{ $property->name }}</h3>
                        <p class="text-gray-700 overflow-hidden whitespace-nowrap text-ellipsis">{{ Str::limit($property->description, 50) }}</p>
                        <p class="text-primary font-bold">{{ $property->price_per_night }}€ / nuit</p>

                        @auth
                            <livewire:booking-button :propertyId="$property->id" />
                        @else
                            <a href="{{ route('login') }}" class="mt-4 block text-center bg-secondary text-white py-2 rounded">
                                Se connecter pour réserver
                            </a>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-6">
        {{ $properties->links() }}
    </div>
@endsection
