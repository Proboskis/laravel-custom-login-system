<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 6rem;">
                <h4 style="border-bottom: 1px solid #b0b0b0;">Login</h4>
                <form action="{{route('login-user')}}" method="POST">
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">
                            {{\Illuminate\Support\Facades\Session::get('success')}}
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('fail'))
                        <div class="alert alert-danger">
                            {{\Illuminate\Support\Facades\Session::get('fail')}}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                               class="form-control"
                               placeholder="Enter your e-mail"
                               name="email"
                               value="{{old('email')}}" />
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                               class="form-control"
                               placeholder="Enter your password"
                               name="password"
                               value="" />
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary" value="login"/>
                    </div>
                    <div class="form-group">
                        <a href="./register">Don't have an account? Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
