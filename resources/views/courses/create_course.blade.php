<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .form-group{
            margin-top:5px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>create course</title>
</head>
<body class="">
    <form enctype="multipart/form-data" method="POST" action="{{route('courses.store')}}" class="bg-dark " style="margin-left:370px;margin-right:200px; margin-top:50px; padding:50px; width:50vw; height:85vh;">
        @csrf
        @method('POST')
  
        <h1 class="text-center text-info">create course</h1>
        
        
        <div class="form-group py-3">
            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name" >
          </div>
          
          <div>
            @foreach ($tracks as $track)
                <div>
                    <input type="checkbox" name="tracks[]" value="{{ $track->id }}" {{ in_array($track->id, old('tracks', $course->tracks->pluck('id')->toArray())) ? 'checked' : '' }}>
                    {{ $track->name }}
                </div>
            @endforeach
        </div>

        <div class="form-group py-3">
          <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter duration">
        </div>
       
        
      
        <button type="submit" class="btn btn-info mt-5">create</button>
      </form>
</body>
</html>