<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use Carbon\Carbon;

class ConferenceController extends Controller
{
    public function register(Request $request, $conferenceId)
    {
        $conference = Conference::findOrFail($conferenceId);
        $user = auth()->user();

        if ($conference->users()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Jūs jau užsiregistravote į šią konferenciją.');
        }

        $conference->users()->attach($user->id);

        return redirect()->route('conferences.show', $conferenceId)->with('success', 'Sėkmingai užsiregistravote į konferenciją.');
    }

    public function index()
    {
        $currentDateTime = Carbon::now();
        $upcomingConferences = Conference::where('date_time', '>', $currentDateTime)->get();
        $pastConferences = Conference::where('date_time', '<=', $currentDateTime)->get();

        return view('conferences.index', compact('upcomingConferences', 'pastConferences'));
    }

    public function show($id)
    {
        $conference = Conference::find($id);

        if (!$conference) {
            abort(404);
        }

        return view('conferences.show', compact('conference'));
    }

    public function create()
    {
        return view('conferences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_time' => 'required|date_format:Y-m-d\TH:i',
            'location' => 'required|string|max:255',
        ]);

        Conference::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date_time' => $request->input('date_time'),
            'location' => $request->input('location'),
        ]);

        return redirect()->route('conferences.index')->with('success', 'Konferencija sėkmingai sukurta.');
    }

    public function edit($id)
    {
        $conference = Conference::find($id);

        if (!$conference) {
            abort(404);
        }

        return view('conferences.edit', compact('conference', 'id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $conference = Conference::find($id);

        if (!$conference) {
            return redirect()->route('conferences.index')->with('error', 'Konferencija nerasta.');
        }

        $conference->title = $request->input('title');
        $conference->description = $request->input('description');
        $conference->date_time = $request->input('date_time');
        $conference->location = $request->input('location');

        $conference->save();

        return redirect()->route('conferences.index')->with('success', 'Konferencija sėkmingai atnaujinta.');
    }

    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);
        $conference->delete();

        return redirect()->route('conferences.index')->with('success', 'Konferencija sėkmingai pašalinta.');
    }
}
