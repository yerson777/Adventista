@extends('adminlte::auth.login')

@section('adminlte_css_pre')
    <style>
        body {
            background-image: url('vendor/adminlte/dist/img/login.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .login-box {
            background-color: rgba(255, 255, 255, 0.7);
        }
    </style>
@stop
