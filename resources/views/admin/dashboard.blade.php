<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap-3.1.1\css\bootstrap.min.css')}}">
    <title>Dashboard</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset">
                <h4>Dashboard</h4><hr>
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$LoggedUserInfo['name']}}</td>
                            <td>{{$LoggedUserInfo['email']}}</td>
                            <td><a href="{{route('auth.logout')}}">Logout</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>