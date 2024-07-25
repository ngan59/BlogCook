<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventParticipantController extends Controller
{
    public function index()
    {
        $events = Event::with('users')->get();
        return view('admin.eventparticipants.list', compact('events'));
    }
    public function view($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('admin.eventparticipants.view', compact('event'));
    }
}
