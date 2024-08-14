<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>student data</title>
</head>
<body>
    <table class="table table-hover" style="width:80vw; margin: 30px 50px;">
        <thead>
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
       
        <tr>
          {{-- @dd($student->name); --}}
            <td >{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->grade}}</td>
            <td>{{$student->gender}}</td>
            <td>{{$student->address}}</td>
            <td><img src="{{asset('storage/'.$student->image)}}" style="width:30%; height:auto;"></td>
            <td><a href="{{route('students.index')}}"><button class="btn btn-warning">Back</button></td>
            
          </tr>
       
       
        </tbody>
      </table>
</body>
</html>