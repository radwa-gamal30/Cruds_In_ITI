<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>course</title>
</head>
<body>
    {{-- @dd($course); --}}
    <table class="table table-hover" style="width:80vw; margin: 30px 50px;">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">name</th>
            <th scope="col">tracks</th>
            <th scope="col">duration</th>
            <th scope="col">AC</th>
          </tr>
        </thead>
        <tbody>
       
        <tr>
       
            {{-- <td >{{$course->id}}</td>
            <td>{{$course->name}}</td>
            <td>
                @foreach ($course->tracks as $track)
                {{$track->name}}
                @endforeach
                    </td>
            <td>{{$course->duration}}</td> --}}
        
            <td><a href="{{route('courses.index')}}"><button class="btn btn-warning">Back</button></td>
            
          </tr>
       
       
        </tbody>
      </table>
</body>
</html>