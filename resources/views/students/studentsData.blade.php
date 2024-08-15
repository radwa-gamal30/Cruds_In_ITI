<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>All Students</title>
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
            <a class="nav-link active" aria-current="page" href="{{route('students.index')}}">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('tracks.index')}}">Tracks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('courses.index')}}">courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('students.create')}}">Create Student</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  {{-- @dd($file(image)); --}}
  <table class="table table-hover " style="width:80vw; margin-left: 100px;padding:30px 50px;">
        <thead style="">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">Grade</th>
            <th scope="col">Gender</th>
            <th scope="col">address</th>
            <th scope="col">image</th>
            <th scope="col">AC</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
        <tr>
            <th >{{$student->id}}</th>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->grade}}</td>
            <td>{{$student->gender}}</td>
            <td>{{$student->address}}</td>
            <td><img src="{{asset('storage/'.$student->image)}}" alt="student-img" style="width: 30%; height:auto;"></td>
            <td class="col">
              <a href="{{route('students.viewSingleStudent',$student->id)}}"><x-button color="success" inside="view"></x-button></a>
              {{-- <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <x-button type="submit" color="danger" inside="Delete"></x-button>
            </form> --}}
            {{-- <a href="{{route('students.create',$student->id)}}"><x-button color="info" inside="create"></x-button></a> --}}
            <a href="{{route('students.edit',$student->id)}}"><x-button color="dark" inside="update"></x-button></a>

            </td>
            
          </tr>
        @endforeach
       
        </tbody>
      </table>
</body>
</html>