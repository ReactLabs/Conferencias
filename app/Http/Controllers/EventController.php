<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Event;
use App\Area;

class EventController extends Controller
{

    function __construct(){
        $this->middleware('is_active');
        $this->middleware('is_moderator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = Event::all();

        $areas = Area::all();

        return view ('moderator.event.index', compact('events', 'areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view ('moderator.event.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Ainda a terminar, pois falta a autenticação do usuário, areas e tags
     * TODO: combobox com areas e tags, e inserir o usuario que criou o evento
     */
    public function store(Request $request)
    {

        $event = new Event();
        
        $event->name = $request->get('name');
        $event->initials = $request->get('initials');
        $event->date = $request->get('date');
        $event->description = $request->get('description');
        $event->qualis = $request->get('qualis');
        $event->link = $request->get('link');
        $event->deadline = $request->get('deadline');
        //$event->user_id = 1;   //temporário, apenas para funcionar por enquanto
        $event->user_id = \Auth::user()->id;

        $event->save();

        $areas = Area::WhereIn('id', $request->get('area'))->get();
        $tags = Tag::WhereIn('id', $request->get('tag'))->get();

        $event->areas()->attach($areas);
        $event->tags()->attach($tags);
        try{



        }catch(\Exception $e){

            $event->delete();
            return redirect ('\moderator\event')->with('warning', 'Error trying to register event, please contact the administrator of the system');

        }

        return redirect ('\moderator\event')->with('success', 'Event registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * TODO: mostras as pesosas que editaram o evento
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view ('moderator.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        $areas = Area::all();

        return view ('moderator.event.edit', compact('event', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * TODO: ainda falta registrar no banco as edições feitas pelos moderadores, criar a tabela pivo
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->name = $request->get('name');
        $event->initials = $request->get('initials');
        $event->date = $request->get('date');
        $event->description = $request->get('description');
        $event->qualis = $request->get('qualis');
        $event->link = $request->get('link');
        $event->deadline = $request->get('deadline');

        $event->save();

        return redirect('moderator/event')->with('success', 'Event updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect('moderator/event')->with('success', 'Event deleted');
    }

    public function getTags(Request $request){

        $tags = Tag::whereIn('area_id', $request->get('areas'))->get();

        return response()->json($tags, 200);
    }

    public function eventsFilter(Request $request) {

        if ($request->get('area') == 0){
            $eventsArea = Event::all();
        }else {
            $area = Area::findOrFail($request->get('area'));
            $eventsArea = $area->events;
        }


        $from = $request->get('date_from');
        $to = $request->get('date_to');

        if ($from == null || $to == null){
            $events = $eventsArea;
        }else {
            $eventsTime = Event::whereBetween('date', [$from, $to])->get();
            $events = $eventsArea->intersect($eventsTime);
        }

        if ($events->count() == 0){
            return redirect('/moderator/event')->with('warning', 'No matching records found');
        }

        $areas = Area::all();

        return view ('moderator.event.index', compact('events', 'areas'));
    }
}
