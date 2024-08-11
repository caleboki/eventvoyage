<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userEvents = Event::where('user_id', auth()->id())->get();
        \Log::info($userEvents);
        return view('dashboard', compact('userEvents'));
    }

    public function attending() {
        $userId = auth()->id();
        $today = Carbon::today()->toDateString();

        $registeredUpcomingEvents = Event::whereHas('registrations', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->where('date', '>=', $today)
        ->get();
        $registeredPastEvents = Event::whereHas('registrations', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->where('date', '<', $today)
        ->get();

        return view('attending', compact('registeredUpcomingEvents', 'registeredPastEvents'));
        
    }
}
