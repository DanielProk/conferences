<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    use \Illuminate\Foundation\Validation\ValidatesRequests;
// Pridėkite šį kintamąjį
protected $conferences = [];

public function __construct()
{
// Pradiniai konferencijų duomenys
$this->conferences = [
['id' => 0, 'title' => 'Test 1', 'description' => 'Test description 1', 'date_time' => '2024-10-07T22:00', 'location' => 'Kaunas'],
['id' => 1, 'title' => 'Test 2', 'description' => 'Test description 2', 'date_time' => '2024-10-08T22:00', 'location' => 'Vilnius'],
];
}


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

        // Gauti konferencijų sąrašą iš sesijos arba sukurti naują
        $conferences = session('conferences', []);

        // Sukurti naują konferenciją
        $conference = [
            'id' => count($conferences) + 1, // Gauti naują id
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date_time' => $request->input('date_time'),
            'location' => $request->input('location'),
        ];

        // Pridėti naują konferenciją į sąrašą
        $conferences[] = $conference;

        // Išsaugoti konferencijas sesijoje
        session(['conferences' => $conferences]);

        return redirect()->route('conferences.index')->with('success', 'Konferencija sėkmingai sukurta.');
    }

    public function edit($id)
    {
        // Gauti visas konferencijas iš sesijos
        $conferences = session('conferences', []);

        // Patikrinti, ar nurodytas ID egzistuoja
        if (!isset($conferences[$id])) {
            abort(404);
        }

        // Grąžinti redagavimo vaizdą su konferencijos duomenimis
        return view('conferences.edit', ['conference' => $conferences[$id], 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        // Validuoti pateiktus duomenis
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        // Gauti konferencijų sąrašą iš sesijos
        $conferences = session('conferences', []);

        // Patikrinti, ar konferencija egzistuoja
        if (isset($conferences[$id])) {
            // Atnaujinti konferencijos informaciją
            $conferences[$id]['title'] = $request->input('title');
            $conferences[$id]['description'] = $request->input('description');
            $conferences[$id]['date_time'] = $request->input('date_time');
            $conferences[$id]['location'] = $request->input('location');

            // Išsaugoti atnaujintą sąrašą sesijoje
            session(['conferences' => $conferences]);

            return redirect()->route('conferences.index')->with('success', 'Konferencija sėkmingai atnaujinta.');
        }

        return redirect()->route('conferences.index')->with('error', 'Konferencija nerasta.');
    }





    public function destroy($id)
    {
        // Gauti konferencijų sąrašą iš sesijos
        $conferences = session('conferences', []);

        // Patikrinti, ar konferencija egzistuoja ir pašalinti
        if (isset($conferences[$id])) {
            unset($conferences[$id]);

            // Atnaujinti sesiją
            session(['conferences' => $conferences]);

            return redirect()->route('conferences.index')->with('success', 'Konferencija sėkmingai pašalinta.');
        }

        return redirect()->route('conferences.index')->with('error', 'Konferencija nerasta.');
    }

}
