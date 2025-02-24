<div>
    <h1 class="text-3xl font-bold text-center text-primary mb-6">📋 Mes Réservations</h1>

    @if ($bookings->isEmpty())
        <p class="text-center text-gray-600">Vous n'avez aucune réservation pour l'instant.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($bookings as $booking)
                <div class="bg-white p-4 shadow rounded">
                    @if ($booking->property->image)
                        <img src="{{ asset('storage/' . $booking->property->image) }}" class="w-full h-48 object-cover rounded" alt="{{ $booking->property->name }}">
                    @endif
                    <h3 class="text-lg font-bold mt-2">{{ $booking->property->name }}</h3>
                    <p class="text-gray-700">{{ $booking->property->description }}</p>
                    <p class="text-primary font-bold">Réservé du {{ $booking->start_date }} au {{ $booking->end_date }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
