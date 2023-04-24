
<html>
    <head>
        <title>DashBoard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        
    </head>
    <script>
         $(document).ready(function(){
            $(".toggle-class").change(function(){

                var status = $(this).prop('checked') == true ? 1 : 0; 
                if(status == 1)
                {
                    $(this).closest("tr").find('.status').text("Active");
                }
                else
                {
                    $(this).closest("tr").find('.status').text("pending");
                }
               
                var user_id = $(this).data('id'); 

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: './changeStatus',
                    data: {'status': status, 'user_id': user_id},
                        success: function(data){
                            // data.success == "active" ? $(this).attr('value', 'true') : $(this).attr('value', 'false')
                         console.log(data.success);
                    }
                });
            });
         });
    </script>
    
    <body class="hm-gradient">
        <a href="Adminlogout" class="clas" class="btn btn-info btn-lg ">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-body">
                <!-- Grid row -->
                    <div class="row">
                    <!-- Grid column -->
                        <div class="col-md-12">
                            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">User's table</h2>
                            <div class="input-group md-form form-sm form-2 pl-0">
                            </div>
                        </div>
                    <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                    <!--Table-->
                       @if(Session::has('message'))
                            <p class="alert alert-warning">{{ Session::get('message') }}</p>
                        @endif
                    <table class="table table-striped">
                    <div class="form-outline mb-4 d-flex gap-2">
                        <form method ="get" action =" {{ url('Dash')}}">
                        <input type="search" class="form-control w-50" name="SearchName" id="datatable-search-input" placeholder ="Here Search User Name" >
                        <input type="submit" class="btn btn-success" value="search"/>
                        </form>
                    </div>
                    <!--Table head-->
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Switch</th>
                            </tr>
                        </thead>
                    <!--Table head-->
                    <!--Table body-->
                        <tbody>
                            @foreach($users as $data)
                                <tr>
                                    <th scope="row"><img src="{{asset('UserProfileImages/' . $data->image)}}" 
                                    style="width:40px; height:40px; border-radius:30px;"/>
                                    </th>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td class="status" >{{ $data->status }}</td>
                                    <td><a href="update/{{ $data->id }}"><i class='fas fa-pen' style='font-size:20px'></i></a></td>
                                    <td><a href="delete/{{ $data->id }}">Delete</a></td>
                                    <td>
                                    <input data-id="{{$data->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle"  {{ $data->status ? 'checked' : '' }}>
                                        <!-- <div class="form-check form-switch">
                                            <input class="form-check-input status " data-id="{{$data->id}}" type="checkbox" checked>
                                        </div> -->
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    <!--Table body-->
                    </table>
                    <a href="AddUser"><button type="button" class="btn btn-success">ADD USER</button></a>
                </div>
            </div>
        </div>
    </body>
</html>