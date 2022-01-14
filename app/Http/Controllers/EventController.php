<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function allEvents()
    {
        $allEvents = Event::all();
        return response()->json($allEvents);
    }


    public function addEvent(Request $request)
    {
        $event = new Event();
        $event->name = $request->name;
        $event->save();
        return response()->json($event);
    }

    public function getAnEvent($id)
    {
        $event = Event::find($id);
        return response()->json($event);
    }

    public function updateAnEvent($id, Request $request)
    {
        $event = Event::find($id);
        if ($event) {
            if ($event->name == $request->name) {
                return "The Event Name is Same as Existing";
            } else {
                $event->name = $request->name;
                $event->save();
            }
        } else {
            return "The Event is Not Exits!";
        }
        return response()->json($event);
    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
            return "The Event been Deleted!";
        } else {
            return "The Event is Not Exits!";
        }
    }

    public function allEventsView()
    {
        $events = Event::all();
        return view('events.all-events', compact('events'));
    }

    public function getSingleEvent($id)
    {
        $event = Event::where('id', $id)->first();
        return view('events.single-event', compact('event'));
    }

    public function addEventView()
    {
        return view('events.add-event');
    }

    public function createEvent(Request $request)
    {
        $event = new Event();
        $event->name = $request->name;
        $event->save();
        return redirect('/');
    }

    public function editEvent($id)
    {
        $event = Event::find($id);
        return view('events.edit-event', compact('event'));
    }

    public function updateEvent(Request $request)
    {
        $event = Event::find($request->id);
        $event->name = $request->name;
        $event->save();
        return redirect('/');
    }
}
