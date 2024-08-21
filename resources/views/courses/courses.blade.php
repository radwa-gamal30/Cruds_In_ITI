<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>All tracks</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('students.index')}}">Students</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link active" aria-current="page" href="{{route('tracks.index')}}">Tracks</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link active" aria-current="page" href="{{route('courses.index')}}">courses</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link active" aria-current="page" href="{{route('courses.create_course')}}">add course</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
    <table class="table table-hover" style="width:85vw; margin: 30px 50px;">
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
          @foreach($courses as $course)
          
        <tr>
            <td >{{$course->id}}</td>
            <td>{{$course->name}}</td>
           <td> @foreach ($course->tracks as $track)
            {{ $track->name }}
        @endforeach</td>
            <td>{{$course->duration}}</td>

        
            <td class="col">
              <a href="{{route('courses.show',$course->id)}}"><x-button color="success" inside="view"></x-button></a>
              <form action="{{ route('courses.destroy_course', $course->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <x-button type="submit" color="danger" inside="delete"></x-button>
            </form>
     
          <a href="{{route('courses.edit_course',$course->id)}}"><x-button color="dark" inside="update"></x-button></a>
            </td>
            
          </tr>

          @endforeach
       
        </tbody>
      </table>
</body>
</html>