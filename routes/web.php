<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HuisdierenController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HuisController;
use App\Http\Controllers\AfspraakController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/afspraak/aanmaken', [AfspraakController::class, 'create'])->name('afspraak.create');
    Route::post('/afspraak', [AfspraakController::class, 'store'])->name('afspraak.store');
    Route::get('/afspraak/{id}', [AfspraakController::class, 'show'])->name('afspraak.show');
    Route::post('/afspraak/{id}/accept', [AfspraakController::class, 'accept'])->name('afspraak.accept');
    Route::post('/afspraak/{afspraak}/review', [AfspraakController::class, 'storeReview'])->name('afspraak.storeReview');
    Route::post('/afspraak/aanvraag/{id}', [AfspraakController::class, 'aanvraag'])->name('afspraak.aanvraag');
    Route::post('/afspraak/accept/{id}', [AfspraakController::class, 'accept'])->name('afspraak.accept');
    Route::post('/afspraak/weiger/{id}', [AfspraakController::class, 'weiger'])->name('afspraak.weiger');
    Route::delete('/afspraak/{id}', [AfspraakController::class, 'destroy'])->name('afspraak.delete');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/block-user/{id}', [AdminController::class, 'blockUser'])->name('admin.blockUser');
    Route::delete('/admin/delete-request/{id}', [AdminController::class, 'deleteRequest'])->name('admin.deleteRequest');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/block-user/{id}', [AdminController::class, 'blockUser'])->name('admin.blockUser');
    Route::post('/admin/unblock-user/{id}', [AdminController::class, 'unblockUser'])->name('admin.unblockUser');
    Route::delete('/admin/delete-request/{id}', [AdminController::class, 'deleteRequest'])->name('admin.deleteRequest');
});

Route::get('/', WelcomeController::class);

Route::controller(HuisdierenController::class)->name('huisdieren.')->group(function () {
    Route::get('/huisdieren', 'index')->middleware(['auth', 'verified'])->name('index');
    Route::get('/huisdieren/create', 'create')->name('create');
    Route::get('/huisdieren/{id}', 'show')->name('show');
    Route::post('/huisdieren/store', 'store')->name('store');
});

Route::controller(HuisController::class)->name('huis.')->group(function () {
    Route::get('/huis', 'index')->middleware(['auth', 'verified'])->name('index');
    Route::get('/huis/create', 'create')->name('create');
    Route::post('/huis/store', 'store')->name('store');
});

Route::resource('/companies', CompanyController::class);
Route::resources([
    '/tags' => TagController::class, 
    '/tasks' => TaskController::class
]);
Route::resource('/activities', ActivityController::class)->except(['index', 'show']);
Route::resource('/contacts.notes', ContactNoteController::class)->shallow();
 

require __DIR__.'/auth.php';
