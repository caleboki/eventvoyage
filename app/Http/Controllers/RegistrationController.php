<?php

namespace App\Http\Controllers;

use App\Mail\EventRegistered;
use Illuminate\Support\Facades\Mail; 
use App\Models\Registration;
use App\Models\Event;
use Exception; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->id(); 
        $event_id = $request->event_id;
        // Check if already registered 
        $exists = Registration::where('user_id', $user_id)->where('event_id', $event_id)->exists(); 
        if ($exists) 
        { 
            return back()->with('error', 'You are already registered for this event.'); 
        }
        // Create registration 
        Registration::create([ 'user_id' => $user_id, 'event_id' => $event_id, ]); 
        
        $event = Event::findOrFail($event_id); 

        try {
            Mail::to($request->user())->send(new EventRegistered($event)); 
        } 
        catch (Exception $e) { 
            Log::error('Email sending failed: ' . $e->getMessage()); 
            return back()->with('error', 'Failed to send email.'); 
        } 
        
        return back()->with('success', 'Registration successful.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($registrationId)
    {
       
        $registration = Registration::findOrFail($registrationId);

        if ($registration->user_id !== auth()->id()) 
        { 
            return back()->with('error', 'You do not have permission to cancel this registration.'); 
        } 

        $registration->delete(); 
        return back()->with('success', 'Registration canceled successfully.'); 

    }
}
