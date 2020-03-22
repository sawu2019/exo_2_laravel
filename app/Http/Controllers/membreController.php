<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\membre;

class membreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membres = membre::all();

        return view('membres.index', compact('membres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('membres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required'
        ]);

        $membre = new Membre([
            'nom'=>$request->get('nom'),
            'prenom'=>$request->get('prenom'),
            'email'=>$request->get('email')

        ]);
        $membre->save();
        return redirect('/membres')->with('sucess', 'membre saved');
    }

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
        $membre = Membre::find($id);
        return view('membres.edit', compact('membre'));
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
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required'
        ]);
        $membre = Membre::find($id);
        $membre->nom =  $request->get('nom');
        $membre->prenom = $request->get('prenom');
        $membre->email = $request->get('email');
        $membre->save();

        return redirect('/membres')->with('success', 'membre updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membre = Membre::find($id);
        $membre->delete();

        return redirect('/membres')->with('success', 'membre deleted!');
    }
}
