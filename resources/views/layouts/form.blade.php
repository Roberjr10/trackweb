<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trackweb</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="body">
<header>
    <div class="container-fluid header">
        <div class="row align-item-start">
            <div class="col-4 text-center">
                <!--imagen de trackweb-->
                <p class="logo">Track<br> Web</p>
            </div>

            <div class="col-4 justify-content-center">
                <h1>PROYECTOS MUSICALES</h1>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4 justify-content-end">
                <a href="{{url('/')}}" class="btn-login"> <button class="btn-inicio">Volver a Home</button></a>
            </div>
        </div>
    </div>
</header>
@include('partials.mensajes')

    @yield('content')

<div class="footer" class="container-fluid" >
    <div class="row align-item-start">
        <div class="col-4">
            <!-- lista de fans, buscador y ajustes-->
            <div class="row text-center">
                <div class="col-4 menu_lateral">
                    @if(Auth::check())
                        <ul>
                            @if(auth()->user()->user == 1)
                                <a href="{{url('homeUser')}}"><li>Home</li></a>
                            @else
                                <a href="{{url('home')}}"><li>Home</li></a>
                            @endif
                            <a href="{{url('fans')}}"><li>FANS</li></a>
                            <a href="{{url('buscador')}}"><li>Búscador</li></a>
                            <a href="{{url('perfil/'. auth()->user()->id)}}"> <li>Mi Perfil</li></a>
                        </ul>
                    @endif
                </div>
            </div>

        </div>

        <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4 justify-content-center">
            <!-- logo de las redes sociales-->
            <!-- logo de las redes sociales-->
            <div class="row">
                <div class="col-4">
                    {{ Html::image('img/img-redes-sociales/instagram.png', 'Logo Instagram') }}
                    <br><p style="color: white"> @rober_jr7 </p>
                </div>
                <div class="col-4">
                    {{ Html::image('img/img-redes-sociales/twitter.png', 'Logo Twitter') }}
                    <br><p style="color: white"> @rober_jr7 </p>
                </div>
                <div class="col-4">
                    {{ Html::image('img/img-redes-sociales/facebook.png', 'Logo Facebook') }}
                    <br><p style="color: white"> @rober_jr7 </p>
                </div>
            </div>
        </div>

        <p class="text-center" style="color: white">&copy Jose Roberto Núñez Almonte</p>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="http://15.188.57.221/trackweb/public/js/main.js"></script>
<script src="http://15.188.57.221/trackweb/public/js/jquery-3.6.0.min.js"></script>
<script>
    $(function () {

        setTimeout(function () {
            if ($(".alert").is(":visible")){
                //you may add animate.css class for fancy fadeout
                $(".alert").fadeOut("fast");
            }
        }, 5000)

    });
</script>
</html>
