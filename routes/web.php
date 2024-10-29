<?php

use Illuminate\Support\Facades\Route;

function getContacts() {
    return
    [
        1 => ['name' => 'Naam 1', 'phone' => '1234567890'],
        2 => ['name' => 'Naam 2', 'phone' => '0124567890'],
        3 => ['name' => 'Naam 3', 'phone' => '9014567890'],
        4 => ['name' => 'Naam 4', 'phone' => '8904567890'],
        5 => ['name' => 'Naam 5', 'phone' => '7894567890'],
        6 => ['name' => 'Naam 6', 'phone' => '6784567890'],
    ]; 
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', function () {
    $contacts = getContacts();
    return view('contacts.index', compact('contacts'));
})->name('contacts.index');

Route::get('/contacts/create', function () {
    return view('contacts.create');
})->name('contacts.create');

Route::get('/contacts/{id}', function ($id) {
    $contacts = getContacts();
    abort_unless(isset($contacts[$id]), 404);
    $contact = $contacts[$id];
    return view('contacts.show')->with('contact', $contact);
})->name('contacts.show');;
 