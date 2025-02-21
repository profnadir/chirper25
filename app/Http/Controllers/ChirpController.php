<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$chirps = Chirp::latest();

        //dd($chirps);

        $chirps = Chirp::with('user')->latest()->paginate(3); //select * from `chirps` order by `created_at` desc
                  //Chirp::with('user')->latest()->get()

        //dd($chirps);

        return view("chirps.index", ["chirps"=>$chirps] );
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
        Gate::authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        Gate::authorize('update', $chirp);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $chirp->update($validated);
 
        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        Gate::authorize('delete', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));

    }
}
