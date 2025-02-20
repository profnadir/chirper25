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
        // get data from model

        // send data to view

        // return view

        return view("chirps.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("chips.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request);
        // validate data

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        
        
        // stock data via model
 
        //Chirp::create(["message" => "hi dev201","user_id"=>$request->user()->id]);

        $request->user()->chirps()->create($validated);

        // redirection vers chirps.index
 
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
