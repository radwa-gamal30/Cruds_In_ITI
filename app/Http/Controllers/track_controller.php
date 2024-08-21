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
        return view('tracks.tracks',compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tracks.create_track');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tracks',
            'location' => 'required|string|min:1',
            'duration' => 'required|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $imagePath=null;
        if ($request->hasFile('logo')) {
            $imagePath=$request->file('logo')->store('tracks');

        }
        
            Track::create(
                ['name'=>$request->input('name'),
                'duration'=>$request->input('duration'),
                'location'=>$request->input('location'),
                'logo'=>$imagePath]);
            
            
        return redirect()->route('tracks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $track=Track::find($id);
        return view('tracks.track',compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $track = Track::findOrFail($id);
        // $trackNames = Track::allNames();',trackNames'
    
        return view('tracks.update_track', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $track=Track::findOrFail($id)->delete();
        return redirect()->route('tracks.index');
    }
}
