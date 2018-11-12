<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::All();

        return view ('admin.area.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            Area::where('name', '=', mb_strtolower($request->get('name')))->firstOrFail();

        }catch(\Exception $e){  //Caso a Area ainda não esteja cadastrado

            $area = new Area;
            $area->name = mb_strtolower($request->get('name'));
            $area->save();
            return redirect('admin/area')->with('success', 'Area registered');
        }
        return redirect('admin/area/create')->with('warning', 'Area already been registered');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::find($id);

        return view ('admin.area.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        return view('admin.area.edit', compact('area', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $db = Area::where('name', '=', mb_strtolower($request->get('name')))->firstOrFail();
            if ($db->id == $id){
                throw new \Exception;
            }

        }catch(\Exception $e){
            $area = Area::find($id);
            $area->name = mb_strtolower($request->get('name'));
            $area->save();
            return redirect('admin/area')->with('success', 'Area edited with success');
        }

        return redirect('admin/area/' . $id . '/edit')->with('warning', 'This name has already been used');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $area = Area::find($id);
            $area->delete();
            return redirect('admin/area')->with('success', 'Area has been deleted');

        } catch (\Exception $e) {

            return redirect('admin/area')->with('warning', 'Area is linked with some object');
        }
    }
}
