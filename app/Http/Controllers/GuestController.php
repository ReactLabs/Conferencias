<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Area;

class GuestController extends Controller
{
    function __construct(){
        $this->middleware('guest');
    }

    public function index(){

        $events = Event::all();

        $areas = Area::all();

        return view ('indexGuest', compact('events', 'areas'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        //return view ('showGuest', compact('event'));
        return view ('moderator.event.show', compact('event'));
    }
}
