<?php

namespace App\Http\Controllers;
use App\Models\Track;


use Illuminate\Http\Request;


class track_controller extends Controller
{
    public function index(){
        $tracks=Track::all();
        return view('tracks.tracks',compact('tracks'));
    }

    public function trackview($id){
        $track=Track::find($id);
        return view('tracks.trackData',compact('track'));
    }

    public function destroy($id){
        $track=Track::findOrFail($id)->delete();
        return redirect()->route('tracks.index');
    }
    public function createtrack(){
        return view('tracks.createtrack');
    }
    public function store(Request $request){
        $trackData=$request->all();
        $newTrack=new Track;
        $newTrack->name=$trackData['name'];
        $newTrack->location=$trackData['location'];
        $newTrack->duration=$trackData['duration'];
        $newTrack->logo=$trackData['logo'];
        if($request->hasFile('logo')){
            $logoname=time().'.'.$newTrack->logo->extension();
            $newTrack->logo->move(public_path('resources/logos'),$logoname);
            $newTrack->logo ='/resources/logos/'.$logoname;
        }
        $newTrack->save();
    // @dd($request->all(),$request->file('logo'));
    return redirect(route('tracks.index'));
    }
    function edit_track($id)
    {
       $track=Track::findOrFail($id);
       return view('tracks.updatetrack',compact("track"));
    }

    function update_track(Request $request,$id)
    {
       $track=Track::findOrFail($id);
       $updatedtrackData=$request->all();
       $track->update($updatedtrackData);
       return to_route('tracks.index');
    }

  
}

