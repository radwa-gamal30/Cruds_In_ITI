<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;

class track_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks=Track::all();
        // return response()->json($tracks);
        return $tracks;
    }

  
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $track=new Track();
        $track->name=$request->input('name');
        $track->location=$request->input('location');
        $track->location=$request->input('duration');
        $track->logo=$request->input('logo');
        $track->save();
        return $track;
            
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        // $track=Track::find($track);
        return $track;
     
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        $track->name=$request->input('name');
        $track->location=$request->input('location');
        $track->location=$request->input('duration');
        $track->logo=$request->input('logo');
        $track->save();
        return $track;
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        $track->delete();
        return response()->json(['message'=>'your track is deleteddsuccessfully']);
    }
}
