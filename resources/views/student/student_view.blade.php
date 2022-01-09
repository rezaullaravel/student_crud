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
            <div class="col-lg-4">
                <h2>Add student info:</h2>
                <h3 class="text-success">{{Session::get('sms')}}</h3>
                <form action="{{route('student.store')}}" method="POST">
                    @csrf



                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Student name</label>
                        <input type="text" name="stu_name"  class="form-control" required>

                      </div>


                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Roll</label>
                        <input type="text" name="roll"  class="form-control" required>
                        <strong style="color: red;">{{Session::get('warning')}}</strong>

                        @error('roll')

                        <strong>{{$message}}</strong>

                        @enderror

                      </div>


                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Registration</label>
                        <input type="text" name="registration"  class="form-control" required>

                    @error('registration')

                    <strong>{{$message}}</strong>

                    @enderror


                      </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Calss name</label>
                      <select name="class_id"  class="form-control" required>
                          <option disabled="" selected="">Select</option>

                           @foreach ($classes as $row)
                          <option value="{{$row->class_name}}">{{$row->class_name}}</option>
                          @endforeach
                      </select>

                      @error('class_id')
                      <strong>{{$message}}</strong>

                      @enderror

                    </div>



                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Section name</label>
                        <select name="section_id"  class="form-control" required>
                            <option disabled="" selected="">Select</option>

                             @foreach ($sections as $row )
                            <option value="{{$row->section_name}}">{{$row->section_name}}</option>
                            @endforeach
                        </select>

                        @error('section_id')
                      <strong>{{$message}}</strong>

                      @enderror

                      </div>



                    <button type="submit" class="btn btn-primary">Add</button>
                  </form>
                  <a href="{{url('/')}}" class="btn btn-success" style="margin-top:15px;">Back to homepage</a>
            </div>


            <div class="col-lg-8">
                <h3>View all Students:</h3>
                <h2>{{Session::get('message')}}</h2>
                <h2>{{Session::get('signal')}}</h2>
                <table class="table table-bordered">
                    <thead style="text-align:center">
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Student name</th>
                        <th scope="col">Roll</th>
                        <th scope="col">Registration</th>
                        <th scope="col">Class</th>
                        <th scope="col">Section</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody style="text-align: center">






                      <tr>
                        <td scope="row">demo</td>
                        <td scope="row">demo</td>
                        <td scope="row">demo</td>
                        <td scope="row">demo</td>
                        <td scope="row">demo</td>
                        <td scope="row">demo</td>
                        <td scope="row">demo</td>


                        {{-- <td scope="row">
                            <a href="{{route('edit.section',$row->id)}}" class="btn btn-success">edit</a>
                            <a href="{{route('delete.section',$row->id)}}" class="btn btn-danger" onclick="return confirm('are you sure to delete this item???');">delete</a>
                        </td> --}}


                      </tr>



                    </tbody>
                  </table>
            </div>


        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    {{-- for section auto select --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="class_id"]').on('change',function(){
                var class_id=$(this).val();
                if(class_id){
                    $.ajax({
                        url:"{{ url('/class/section/ajax') }}/"+class_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            var d=$('select[name="section_id"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="section_id"]').append(
                                    '<option value="'+value.section_name+'">'+
                                    value.section_name+'</option>');
                            });
                        },
                    });
                }else{
                    alert('danger');
                }
            });
        });
    </script>



{{--bootstrap cdn--}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
