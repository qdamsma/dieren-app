<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ContactNoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', WelcomeController::class);

Route::controller(ContactController::class)->name('contacts.')->group(function () {
    Route::get('/contacts', 'index')->middleware(['auth', 'verified'])->name('index');
    Route::get('/contacts/create', 'create')->name('create');
    Route::get('/contacts/{id}', 'show')->name('show');
});

Route::resource('/companies', CompanyController::class);
Route::resources([
    '/tags' => TagController::class, 
    '/tasks' => TaskController::class
]);
Route::resource('/activities', ActivityController::class)->except(['index', 'show']);
Route::resource('/contacts.notes', ContactNoteController::class)->shallow();
 

require __DIR__.'/auth.php';
