<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceRegistration extends Model
{
    public function register($conferenceId)
    {
        $user = auth()->user();

        $existingRegistration = ConferenceRegistration::where('user_id', $user->id)
            ->where('conference_id', $conferenceId)
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'You are already registered for this conference.');
        }

        // Register the user
        ConferenceRegistration::create([
            'user_id' => $user->id,
            'conference_id' => $conferenceId,
        ]);

        return redirect()->back()->with('success', 'Successfully registered for the conference!');
    }
}
