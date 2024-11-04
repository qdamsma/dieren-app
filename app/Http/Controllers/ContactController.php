<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = $this->getContacts();
        return view('contacts.index', compact('contacts'));
    }

    protected function getContacts() {
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

    public function create() {
        return view('contacts.create');
    }

    public function show($id) {
        $contacts = $this->getContacts();
        abort_unless(isset($contacts[$id]), 404);
        $contact = $contacts[$id];
        return view('contacts.show')->with('contact', $contact);
    }
}
