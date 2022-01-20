<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VMG | Login</title>

    <!-- Main -->
    <link rel="stylesheet" href="{!! asset('cms/css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('cms/css/app.css') !!}" />

    <!-- Custom -->
    <link rel="stylesheet" href="{!! asset('cms/css/custom.css') !!}" />
</head>

<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">VMG</h1>
        </div>
        <br>
        <h3>Welcome</h3>
        <p>Login</p>
        <form class="m-t" role="form" method="POST" action="{{ route('login') }}" id="login">
            <div class="main-messages"></div>
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Email" required name="email" autofocus>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required name="password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b btn-login">Login</button>
        </form>
    </div>
</div>

<!-- Main -->
<script src="{!! asset('cms/js/app.js') !!}" type="text/javascript"></script>

</body>

</html>
