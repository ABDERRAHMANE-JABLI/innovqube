<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Property;
use App\Models\Booking;



Route::get('/', function () {
    $properties = Property::paginate(10);
    return view('home', compact('properties'));
})->name('home');


Route::get('/reservations', function () {
    return view('reservations');
})->middleware('auth')->name('reservations');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
