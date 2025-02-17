<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //get data 

        // if user auth
        return view("chirps.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("chirps.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        // validation data
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        ;
        // save db
        //Chirp::create(["message"=>"hi dev","user_id"=>$request->id()]);

        $request->user()->chirps()->create($validated);
        
        // redirection
        return redirect(route('chirps.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}
