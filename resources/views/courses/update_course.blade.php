<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update course</title>
    <style>
        .form-group{
            margin-top:5px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <h1 class="text-center text-info m-5">Update {{$course->id}}</h1>
    <form class=" border p-2 bordered w-75 m-auto" method="post" action="{{route('courses.update_course',$course->id)}}">
        @csrf
        @method('PUT')
        /// name         
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name" value="{{old('name',$course->name)}}">
          </div>
        
          
          <div>
            @foreach ($Course->tracks as $track)
                <div>
                    <input type="checkbox" name="tracks[]" value="{{ $track->id }}" {{ in_array($track->id, old('tracks', $course->tracks->pluck('id')->toArray())) ? 'checked' : '' }}>
                    {{ $track->name }}
                </div>
            @endforeach
        </div>


        <div class="form-group">
          <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter duration" value="{{old('duration',$course->duration)}}">
        </div>
       
      
        <button type="submit" class="btn btn-info mt-5">update</button>
      </form>


</body>
</html>
