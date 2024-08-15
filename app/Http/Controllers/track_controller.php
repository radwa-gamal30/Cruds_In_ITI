<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Track;


use Illuminate\Http\Request;


class track_controller extends Controller
{
    public function index(){
        $tracks=Track::all();
        return view('tracks.tracks',compact('tracks'));
    }

  

    public function create(){
        return view('tracks.createtrack');
    }
    public function store(Request $request) {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:tracks',
            'location' => 'required|string|min:1',
            'duration' => 'required|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'name.required' => 'The track name is required.',
            'name.unique' => 'This track name is already taken.',
            'logo.image' => 'The logo must be an image file.',
        ]);
    
        $track = new Track;
        $track->name = $request->input('name');
        $track->location = $request->input('location');
        $track->duration = $request->input('duration');
    
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imagename = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('public/images/logos', $imagename, 'public');
            $track->logo = $imagePath; 
        } else {
            $track->logo = 'public/images/logos/default.png';  // Only set this if no file is uploaded
        }
    
        $track->save(); // Save the track instance directly
        return redirect(route('tracks.index'));
    }


    public function trackview($id){
        $track=Track::find($id);
        return view('tracks.trackData',compact('track'));
    }

    function edit($id)
    {
       
       $track = Track::findOrFail($id);
       $trackNames = Track::allNames();
   
       return view('tracks.updatetrack', compact('track', 'trackNames'));
    }

    function update(Request $request,$id)
    {
       $request->validate([
            'name' => 'required|string|max:255|unique:tracks',
            'location' => 'required|string|max:255',
            'duration' => 'required|string|min:1',           
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'

        ],
        [ 'name.required' => 'The track name is required.',
        'name.unique' => 'This track name is already taken.',
        'logo.image' => 'The logo must be an image file.', ]
    );
       $track=Track::findOrFail($id);
       $updatedtrackData=$request->except('logo');
       if($request->hasFile('logo')){
        $request->validate([
            'logo' => 'mimes:jpeg,jpg,png,gif|max:2048' 
        ]);
        $image = $request->file('logo');
        $imagename = time() . '.' . $image->extension();
        $imagePath=$request->file('logo')->storeAs('public/images/logos',$imagename,'public') ;
               $track->logo = $imagePath; 
               $updatedtrackData['logo']=$imagePath;
    } else {
        $track->logo = 'public/images/logos/default.png';  // Only set this if no file is uploaded
    }

       $track->update($updatedtrackData);
       return to_route('tracks.index');
    }
    
    
    public function destroy($id){
        $track=Track::findOrFail($id)->delete();
        return redirect()->route('tracks.index');
    }
}

