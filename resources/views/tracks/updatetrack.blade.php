<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update track</title>
    <style>
        .form-group{
            margin-top:5px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <h1 class="text-center text-info m-5">Update {{$track->id}}</h1>
    <form class=" border p-2 bordered w-75 m-auto" method="post" action="{{route('tracks.update_track',$track->id)}}">
        @csrf
        @method('PUT')
        /// name         
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name" value="{{old('name',$track->name)}}">
          </div>
          {{-- <select name="track_id">
            @foreach ($trackNames as $trackName)
                <option value="{{ $trackName }}">{{ $trackName }}</option>
            @endforeach
        </select> --}}
        <div class="form-group">
          <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" value="{{old('location',$track->location)}}">

        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter duration" value="{{old('duration',$track->duration)}}">
        </div>
        <div class="form-group">
          <input type="file" class="form-control" id="logo" name="logo" placeholder="Enter logo" value="{{old('logo',$track->logo)}}">
        </div>
        
      
        <button type="submit" class="btn btn-info mt-5">update</button>
      </form>


</body>
</html>
