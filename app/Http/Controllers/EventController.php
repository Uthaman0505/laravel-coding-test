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
        if ($event) {
            return response()->json($event);
        } else {
            return "The Event is Not Exits!";
        }
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
}
