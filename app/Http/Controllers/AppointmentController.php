<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'pet_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'appointment_date' => 'required|date|after_or_equal:today',
            'notes' => 'nullable|string',
        ]);

        Appointment::create($validated);

        return redirect()->back()->with('success', 'Appointment successfully saved.');
    }
}
