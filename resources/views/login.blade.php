<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CFC : Login</title>
    <link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet" media="screen">
    {{--<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">--}}
    <link rel="stylesheet" href="{{url('assets/css/login_style.css')}}" type="text/css"/>
</head>
<style>
    body {
        position: relative;
        background-image: url({{url('assets/img/bg2.jpg')}});
        background-repeat: no-repeat;
        background-size: 100% 100vh;
    }

    @charset "utf-8";
    /* CSS Document */

    * {
        margin: 0;
        padding: 0;
    }

    #login-form {
        margin: 0% auto;
        max-width: 500px;
    }
    .errorClass {
        border: 1px solid red;
    }

    /* home page */
    #wrapper {
        padding-top: 50px;
    }
    .loginlg{
        height: 100%;
        margin-top: -13px;
    }

</style>
<body class="img-responsive" style="height: auto">

<div id="login-form">
    <div class="imgcontainer">
        <img src="{{url('assets/img/cfc_logo.jpg')}}" alt="Avatar"
              class="center-block loginlg"/>
    </div>

    <div class="container"
         style="width: 470px; margin-top: 0px; padding: 25px; box-shadow: 5px 5px 5px #000000; background-color: rgba(10,10,10,0.1)">
        <br>
        <div class="form-group">
            <h2 class=""><span class="glyphicon glyphicon-log-in"></span> Sign In </h2>
        </div>
        <div class="form-group">
            <hr/>
        </div>
        {!! Form::open(['url' => 'login_user', 'class' => 'form-horizontal', 'id'=>'frmLogin']) !!}
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="username" class="form-control required" name="email"
                       placeholder="Username"
                       maxlength="15"/>
                <span id="check-e"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" class="form-control required" name="password" maxlength="15"
                       placeholder="Password"/>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary" name="btn-login"><span
                        class="glyphicon glyphicon-log-in"></span> Sign In
            </button>
            <br>
            <a href="{{url('/waiter')}}" class="btn btn-success">Go to waiter login</a>
        </div>
        {!! Form::close() !!}

        <div class="form-group">
            <hr/>
        </div>
        @if($errors->any())
            <div role="alert" id="alert" class="alert alert-danger">{{$errors->first()}}</div>
        @endif
    </div>
</div>

<script src="{{ url('assets/js/jquery.js') }}"></script>
<script src="{{ url('assets/js/validation.js') }}"></script>
<script>
    $(document).ready(function () {
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 3000);
    });
</script>
</body>
</html>