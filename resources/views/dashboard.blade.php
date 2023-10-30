@extends('adminlte::page')

@section('title', '¡Bienvenido a la Iglesia Adventista!')

@section('content_header')
<div style="background-color: #2980B9; padding: 5vh 0; text-align: center; font-family: 'Caveat', cursive;">
    <h1 style="color: #FFFFFF; font-size: 2.5em; text-shadow: 2px 2px 4px #000000; font-family: 'Indie Flower', cursive;">Descubre una comunidad comprometida con la fe y el servicio</h1>
    <div style="color: #FFFFFF; text-align: center; padding-top: 10vh; font-family: 'Satisfy', cursive; text-shadow: 1px 1px 2px #000000;">
        <p>¡Bienvenido a la Iglesia Adventista! Te invitamos a ser parte de nuestra familia y a explorar nuestras actividades y eventos para fortalecer tu fe. Con nosotros, encontrarás una comunidad comprometida con valores espirituales, educativos y de servicio a los demás.</p>
        <p>¡Esperamos verte pronto en nuestras actividades y servicios!</p>
        <div style="background-image: url('vendor/adminlte/dist/img/universidad2.jpg'); background-size: cover; height: 100vh;"> 
    </div>
    </div>
</div>

   
@stop

@section('content')
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('¡Hola! Bienvenido a la Iglesia Adventista.'); </script>
@stop
