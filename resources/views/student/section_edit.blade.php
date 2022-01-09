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
                <h2>Edit section section:</h2>
                <h3 class="text-success">{{Session::get('sms')}}</h3>
                <form action="{{route('section.update')}}" method="POST" name="editForm">
                    @csrf

                    <input type="hidden" name="id" value="{{$section->id}}">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Class name</label>
                      <select name="class_id"  class="form-control">
                          <option disabled="" selected="">Select</option>

                          @foreach ($classes as $row )
                          <option value="{{$row->class_name}}">{{$row->class_name}}</option>
                          @endforeach
                      </select>

                    </div>


                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Section name</label>
                        <input type="text" name="section_name" value="{{$section->section_name}}"  class="form-control">

                      </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>





        </div>
    </div>

    <script>
        document.forms['editForm'].elements['class_id'].value='{{$section->class_id}}';


    </script>



{{--bootstrap cdn--}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
