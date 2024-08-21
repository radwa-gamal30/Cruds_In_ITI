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

    <title>add course</title>
</head>
<body class="">
    <form enctype="multipart/form-data" method="POST" action="{{route('courses.store')}}" class="bg-dark " style="margin-left:370px;margin-right:200px; margin-top:50px; padding:50px; width:50vw; height:85vh;">
        @csrf
        @method('POST')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <h1 class="text-center text-info">Add course</h1>
        
        
        <div class="form-group py-3">
            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name" >
          </div>

         
          <div class="form-group py-3">
            <label for="track_id">Choose Track:</label>
            <select name="track_id" id="track_id" class="form-control">
                <option value="" selected disabled>Choose Track...</option>
                @foreach ($tracks as $track)
                    <option value="{{ $track->id }}">{{ $track->name }}</option>
                @endforeach
            </select>
        </div>
       

        <div class="form-group py-3">
          <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter duration">
        </div>
       
        
      
        <button type="submit" class="btn btn-info mt-5">create</button>
      </form>
</body>
</html>