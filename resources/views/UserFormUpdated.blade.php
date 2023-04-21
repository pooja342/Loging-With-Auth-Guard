<html>
    <head>
        <title>ADMIN-LOGIN</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </head>
    <style>
        body {
            background-image: url("red.avif");
            background-image:no-repeat;
            background-size: cover;
            background-repeat: no-repeat;
        }
        p {
            color :red;
        }
                
    </style>
    <body>
        <div style="width:500px; height : 600px; margin :200px 0px 0px 400px">
            @if(Session::has('message'))
                <p class="alert alert-warning">{{ Session::get('message') }}</p>
            @endif
            <h4>  Updated Record {{ $data->name}} </h4>
            <form method = "post" action ="{{url('RecordUpdated')}}" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Name</label>
                <input type="text" id="form2Example1" value="{{ $data->name}}" name="name" class="form-control" />
                    @if ($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email address</label>
                <input type="email" id="form2Example1" value="{{ $data->email}}" name="email" class="form-control" />
                    @if ($errors->has('email'))
                         <p>{{ $errors->first('email') }}</p>
                    @endif
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" id="form2Example2"  name="password" class="form-control" />
                    @if ($errors->has('email'))
                        <p>{{ $errors->first('password') }}</p>
                    @endif
            </div>
            <input type="text" value="{{ $data->id }}" name="UserID" class="form-control" />
            <!-- User-Profile -->
            <div class="form-outline mb-4">
                <label class="form-label" >User Profile</label>
                <input type="file"  name="file" class="form-control" />
                    @if ($errors->has('file'))
                        <p>{{ $errors->first('file') }}</p>
                    @endif
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            </form>
        </div>
    </body>
</html>