<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Area;

class TagController extends Controller
{
    function __construct(){
        $this->middleware('is_active');
        $this->middleware('is_admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::All();

        return view ('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view ('admin.tag.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tag = new Tag;
        $tag->name = mb_strtolower($request->get('name'));
        $tag->area_id = $request->get('area');
        $tag->save();
        return redirect('admin/tag')->with('success', 'Tag registered');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);

        return view ('admin.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit', compact('tag', 'id'));
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
            $db = Tag::where('name', '=', mb_strtolower($request->get('name')))->firstOrFail();
            if ($db->id == $id){
                throw new \Exception;
            }

        }catch(\Exception $e){
            $tag = Tag::find($id);
            $tag->name = mb_strtolower($request->get('name'));
            $tag->save();
            return redirect('admin/tag')->with('success', 'Tag edited with success');
        }

        return redirect('admin/tag/' . $id . '/edit')->with('warning', 'This name has already been used');
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
            $tag = Tag::find($id);
            $tag->delete();
            return redirect('admin/tag')->with('success', 'Tag has been deleted');

        } catch (\Exception $e) {

            return redirect('admin/tag')->with('warning', 'Tag is linked with some object');
        }
    }
}
