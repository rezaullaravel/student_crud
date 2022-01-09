<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student  crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h2>Add section:</h2>
                <h3 class="text-success">{{Session::get('sms')}}</h3>
                <form action="{{route('section.store')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Class name</label>
                      <select name="class_id"  class="form-control" required>
                          <option disabled="" selected="">Select</option>

                          @foreach ($classes as $row )
                          <option value="{{$row->class_name}}">{{$row->class_name}}</option>
                          @endforeach
                      </select>

                      @error('class_id')
                      <h4 style="color:red;">{{$message}}</h4>

                      @enderror

                    </div>


                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Section name</label>
                        <input type="text" name="section_name"  class="form-control" required>

                      </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                  </form>

                  <a href="{{url('/')}}" class="btn btn-success" style="margin-top:15px;">Back to home page</a>
            </div>


            <div class="col-lg-7">
                <h3>View all sections:</h3>
                <h2>{{Session::get('message')}}</h2>
                <h2>{{Session::get('signal')}}</h2>
                <table class="table table-bordered">
                    <thead style="text-align:center">
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Class name</th>
                        <th scope="col">Section name</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody style="text-align: center">


                        @foreach ($sections as $row)



                      <tr>
                        <td scope="row">{{$row->id}}</td>
                        <td scope="row">{{$row->class_id}}</td>
                        <td scope="row">{{$row->section_name}}</td>

                        <td scope="row">
                            <a href="{{route('edit.section',$row->id)}}" class="btn btn-success">edit</a>
                            <a href="{{route('delete.section',$row->id)}}" class="btn btn-danger" onclick="return confirm('are you sure to delete this item???');">delete</a>
                        </td>


                      </tr>
                      @endforeach


                    </tbody>
                  </table>
            </div>


        </div>
    </div>



{{--bootstrap cdn--}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
