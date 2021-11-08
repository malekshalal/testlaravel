<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap-3.1.1\css\bootstrap.min.css')}}">
    <title>Register</title>
</head>
<body>

    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-4 col-md-offset-4">
                <h4 style="text-align: center">Register</h4><hr>
                <form action="{{route('auth.save')}}" method="post">

                    
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                        
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger"></div>
                        {{Session::get('fail')}}
                    @endif
                   @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{old('name')}}">

                    </div>
                    <span class="text-danger">@error('name'){{$message}} @enderror</span>
                    
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" value="{{old('email')}}">

                    </div>
                    <span class="text-danger">@error('email'){{$message}} @enderror</span>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">

                    </div>
                    <span class="text-danger">@error('password'){{$message}} @enderror</span>

                    <button type="submit" class=" btn btn-block btn-primary ">Sign Up</button>
                    <hr>
                    <a href="{{route('auth.login')}}">I already have an account, Sign In</a>
                </form>
                
            </div>
        </div>    
    </div>
    
</body>
</html>