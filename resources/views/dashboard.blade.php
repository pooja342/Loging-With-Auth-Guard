<html>
    <head>
        <title>DashBoard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
        body {
            background-image: url("red.avif");
            background-image:no-repeat;
            background-size: cover;
            background-repeat: no-repeat;
        }
       
        .hm-gradient {
            background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);
        }
        .darken-grey-text {
            color: #2E2E2E;
        }
        .input-group.md-form.form-sm.form-2 input {
            border: 1px solid #bdbdbd;
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }
        .input-group.md-form.form-sm.form-2 input.purple-border {
            border: 1px solid #9e9e9e;
        }
        .input-group.md-form.form-sm.form-2 input[type=text]:focus:not([readonly]).purple-border {
            border: 1px solid #ba68c8;
            box-shadow: none;
        }
        .form-2 .input-group-addon {
            border: 1px solid #ba68c8;
        }
        .danger-text {
            color: #ff3547; 
        }  
        .success-text {
            color: #00C851; 
        }
        .table-bordered.red-border, .table-bordered.red-border th, .table-bordered.red-border td {
            border: 1px solid #ff3547!important;
        }        
        .table.table-bordered th {
            text-align: center;
        }
        table th {
            text-align: center;
        } 
        table  {
            text-align: center;
        }
        .clas {
            margin:50px 0px 0px 1650px;
        }
    </style>
    
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
                    <table class="table table-striped">
                    <!--Table head-->
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
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
                                    <td><a href="update/{{ $data->id }}"><i class='fas fa-pen' style='font-size:20px'></i></a></td>
                                    <td><a href="delete/{{ $data->id }}"><i class="fa fa-trash-o" style="font-size:20px"></i></a></td>
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