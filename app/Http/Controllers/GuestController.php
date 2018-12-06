<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class GuestController extends Controller
{
    function __construct(){
        $this->middleware('guest');
    }

    public function index(){

        $events = Event::all();

        return view ('indexGuest', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        //return view ('showGuest', compact('event'));
        return view ('moderator.event.show', compact('event'));
    }
}
