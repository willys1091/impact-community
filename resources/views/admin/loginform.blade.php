<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login to Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="shortcut icon" href="{{asset('/assets/img/Logo_only.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://pusc.or.id/PUSC/css/util-login.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>
<style>
    .login-title-box {
        background-color: #666A6F;
        background-image: linear-gradient(to right, #545b62, #4f565d, #4b5157, #464c52, #42474d, #42474d, #42474d, #42474d, #464c52, #4b5157, #4f565d, #545b62);
        padding: 20px 0 8px 0;
        border-top-left-radius: 7px;
        border-top-right-radius: 7px;
        //border-bottom: 2.5px solid gray;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }

    .login-form {
        width: 385px;
        margin: 30px auto;
    }

    .login-padding {
        padding: 30px 30px 15px 30px;
    }

    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        //padding: 30px;
    }

    .login-form h2 {
        font-family: 'Open Sans', sans-serif;
        font-size: 25px;
        font-weight: 550;
        margin: 0 0 15px;
        color: white;
    }

    .form-control,
    .login-btn {
        font-family: 'Open Sans', sans-serif;
        min-height: 38px;
        border-radius: 2px;
    }

    .input-group-addon .fa {
        font-size: 18px;
    }

    .login-btn {
        background-image: linear-gradient(to right, #545b62, #4f565d, #4b5157, #464c52, #42474d, #42474d, #42474d, #42474d, #464c52, #4b5157, #4f565d, #545b62);
        font-family: 'Open Sans', sans-serif;
        font-size: 15px;
        font-weight: bold;
        border-radius: 7px;
    }

    .login-btn:hover {
        background-image: linear-gradient(to right, #646a71, #5f656c, #5a6066, #555b61, #50565c, #50565c, #50565c, #50565c, #555b61, #5a6066, #5f656c, #646a71);
    }

    .login-btn:active {
        background-image: linear-gradient(to right, #4a4b4e, #45474a, #414246, #3c3e42, #383a3e, #383a3e, #383a3e, #383a3e, #3c3e42, #414246, #45474a, #4a4b4e);
    }

    .social-btn .btn {
        border: none;
        margin: 10px 3px 0;
        opacity: 1;
    }

    .social-btn .btn:hover {
        opacity: 0.9;
    }

    .social-btn .btn-primary {
        background: #26ea35;
    }

    .social-btn .btn-info {
        background: #64ccf1;
    }

    .social-btn .btn-danger {
        background: #df4930;
    }

    .or-seperator {
        margin-top: 20px;
        text-align: center;
        border-top: 1px solid #ccc;
    }

    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
    }

    .container-login100 {
        width: 100%;
        min-height: 100vh;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 15px;

        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        z-index: 1;
    }

    .container-login100::before {
        content: "";
        display: block;
        position: absolute;
        z-index: -1;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        /*background-color: rgba(0, 0, 0, 0.25);*/
    }

</style>

<body>
    <div class="limiter">
        <div class="container-login100"
            style="background-color:  rgb(226, 226, 226);">
            <div class="login-form">
                @if (session('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('status') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="top: -7px;>
						<span aria-hidden=" true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{route('admin.loginPost')}}" method="post">
                    {{ csrf_field() }}
                    
                    <div class="login-title-box ">
                        
                        <h2 class="text-center">Admin Panel</h2>
                    </div>
                    <div class="login-padding d-flex flex-column">
                        <img src="{{asset('/assets/img/Logo_only.png')}}" class="img-fluid mx-auto mb-3" alt="">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="username" placeholder="Username"
                                    required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required="required">
                            </div>
                        </div>
                        {{--<div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label ml-5" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                            </div>
                            
                        </div>--}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary login-btn btn-block">LOGIN</button>
                        </div>
                    </div>

            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>


</body>
</head>

</html>
