<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\Mail\EventCreated; 
use App\Mail\EventUpdated; 
use Illuminate\Support\Facades\Mail; 
use Illuminate\Http\RedirectResponse; 
use Illuminate\View\View; 
use Exception; 
use Illuminate\Support\Facades\Log;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upcomingEvents = Event::where('date', '>=', Carbon::today()->toDateString())->get(); 
        $pastEvents = Event::where('date', '<', Carbon::today()->toDateString())->get(); 
        return view('events.index', compact('upcomingEvents', 'pastEvents')); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(([
            'title' => 'required|string|max:255', 
           'description' => 'required|string', 
           'date' => 'required|date', 
           'time' => 'required', 
           'location' => 'required|string|max:255', ]));
           
        $event = $request->user()->events()->create($validated); 
        try { 
            Mail::to($request->user())->send(new EventCreated($event)); 
        } catch (Exception $e) { 
            Log::error('Email sending failed: ' . $e->getMessage()); 
            return back()->with('error', 'Failed to send email.'); 
        }
        
        return redirect()->route('events.index')->with('success', 'Event created successfully!');
           
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        if (auth()->id() !== $event->user_id) { 
            return redirect()->route('events.index')->with('error', 'You are not authorized to edit this event.');
        } 
        
        return view('events.edit', compact('event'));
            
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        if (auth()->id() !== $event->user_id) { 
            return back()->with('error', 'You are not authorized to edit this event.'); 
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255', 
            'description' => 'required|string', 
            'date' => 'required|date', 
            'time' => 'required', 
            'location' => 'required|string|max:255', 
        ]); 
            
        $event->update($validated);

        try { 
            Mail::to($request->user())->send(new EventUpdated($event)); 
            } 
        catch (Exception $e) { 
            Log::error('Email sending failed: ' . $e->getMessage()); 
            return back()->with('error', 'Failed to send email.'); 
        }

        $registeredUsers = $event->registrations()->with('user')->get()->pluck('user');

        foreach ($registeredUsers as $user) { 
            try { 
                Mail::to($user->email)->send(new EventUpdated($event)); 
            } 
            catch (Exception $e) { 
                Log::error("Email sending failed to registered user (ID: {$user->id}): " . $e->getMessage()); 
            } 
        }
        
        return redirect()->route('events.show', $event->id)->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
