<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;

class UserController extends RegisterController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('active', 'asc')->get();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        //
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.user.edit', compact('user', 'id'));
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
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->type = $request->get('type');

        $user->save();

        return redirect('admin/user/index')->with('success', 'User edited with success');
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
            $user = User::find($id);

            if (\Auth::user()->id == $id) {
                return redirect('admin/user/index')->with('warning', 'you can\'t delete yourself');

            }

            $user->delete();
            return redirect('admin/user/index')->with('success', 'user has been deleted');

        } catch (\Exception $e) {
            return redirect('admin/user/index')->with('warning', 'user don\'t can deleted');

        }

    }

    public function setActive($id){
        $user = User::find($id);

        if(\Auth::user()->id == $id){
            return redirect('admin/user/index')->with('warning', 'you can\'t disable yourself');
        }

        if ($user->active){
            $user->active = false;
            $message = 'user has been disable';
        }else{
            $user->active = true;
            $message = 'user has been activated';
        }

        $user->save();

        return redirect('admin/user/index')->with('success', $message);
    }
}
