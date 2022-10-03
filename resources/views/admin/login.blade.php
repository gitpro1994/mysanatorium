<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/user-management-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2022 11:15:43 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Management Admin</title>
    <link rel="stylesheet" href="{{ asset('backend/css/login.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body class="crm_body_bg login-background" style="background-image: url({{ asset('backend/images/login-background.jpg') }}); background-size: cover">
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->
        <!-- Icon -->
        <div class="fadeIn first mt-4 mb-4">
            <img src="{{asset('backend/images/logo_new.png')}}" id="icon" alt="User Icon" />
        </div>
        <!-- Login Form -->
        <form method="POST" class="login-form" action="{{ route('admin.authenticate') }}" name="login-form">
            @csrf
            <input type="text" id="login" class="fadeIn second @error('email') is-invalid @enderror" name="email" placeholder="email">
            <input type="password" id="password" class="fadeIn third @error('password') is-invalid @enderror" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>
        <div id="formFooter" class="error-section">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

    </div>
</div>

</body>
</html>
