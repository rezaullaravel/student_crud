<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h2>Edit class:</h2>
                <h3>{{Session::get('sms')}}</h3>
                <form action="{{route('classs.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$clas->id}}">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Class name</label>
                      <input type="text" name="class_name" value="{{$clas->class_name}}" class="form-control" required>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>


        </div>
    </div>



{{--bootstrap cdn--}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
