<?php

namespace App\Http\Controllers;

use App\Models\Conference; // Importuoti Conference modelį
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        // Gauti konferencijas iš sesijos
        $conferences = session('conferences', []);

        return view('conferences.index', compact('conferences'));
    }

    public function show($id)
    {
        // Gauti visas konferencijas iš sesijos
        $conferences = session('conferences', []);

        // Patikrinti, ar nurodytas ID egzistuoja
        if (!isset($conferences[$id])) {
            abort(404); // Jei ID neegzistuoja, rodo 404 klaidą
        }

        // Grąžinti atvaizduojamą konferenciją
        return view('conferences.show', ['conference' => $conferences[$id]]);
    }

    public function create()
    {
        return view('conferences.create');
    }

    public function store(Request $request)
    {
        // Validuoti pateiktus duomenis
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        // Sukurti konferenciją - šiuo atveju galime ją saugoti sesijoje
        $conference = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date_time' => $request->input('date_time'),
            'location' => $request->input('location'),
        ];

        // Naudojame sesiją, kad saugotume konferencijas
        session()->push('conferences', $conference);

        // Peradresuoti atgal į konferencijų sąrašą su sėkmingo pranešimo sesijoje
        return redirect()->route('conferences.index')->with('success', 'Konferencija sėkmingai sukurta.');
    }

}
