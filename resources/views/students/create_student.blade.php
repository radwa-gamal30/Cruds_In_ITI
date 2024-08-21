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

    <title>add student</title>
</head>
<body class="">
    <form enctype="multipart/form-data" method="POST" action="{{route('students.store')}}" class="bg-dark py-3" style="margin-left:370px;margin-right:200px; margin-top:50px; padding:50px; width:50vw; height:85vh;">
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
        <h1 class="text-center text-info">Add Student</h1>
        <div class="form-group py-3">
            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name">
          </div>
        <div class="form-group py-3">
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="grade" name="grade" placeholder="Enter Grade">
        </div>
        <div class="form-group py-3">
            <select id="gender" name="gender" class="form-control">
              <option selected disabled>Choose gender...</option>
              <option value="male" >male</option>
              <option value="female" >female</option>
            </select>
          </div>
      
          <div class="form-group py-3">
            <input type="file" class="form-control" id="image" name="image" placeholder="Enter image">
          </div>
        <div class="form-group py-3">
          <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address">
        </div>
         
        <div class="form-group py-3">
          <select id="track_id" name="track_id" class="form-control">
            <option selected disabled>select Track...</option>
            @foreach ($tracks as $track) 
            <option  value="{{$track->id}}">{{$track->name}}</option>
            @endforeach

          </select>        
        </div> 


        <button type="submit" class="btn btn-info mt-5">Submit</button>
      </form>
</body>
</html>