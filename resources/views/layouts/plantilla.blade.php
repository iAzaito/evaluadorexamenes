<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{!! asset('css/Welcome.css') !!}"
    rel="stylesheet">
    <link href="{!! asset('css/CardPregunta.css') !!}"
    rel="stylesheet">
</head>

<body class="bg-white text-gray-800 ">
    
    <nav class="flex py-5 bg-gray-500 text-white w-full">
        <div class="flex justify.center">
            <a class="btnedit" href="{{route("login.destroy")}}"><button class="bg-red-700 shadow rounded hover:bg-gray-300 py-2 px-5">Salir</button></a>
        </div>
        <div class="m-auto">
            <ul class="px-16 ml-auto m-auto flex justify-center">
                @if(auth()->check())
                        @if(auth()->user()->tipoUsuario == 'Alumno')
                            <li class="mx-6">
                                <a href="{{route('homealumno.index')}}" class="font-semibold hover:bg-gray-600 py-3 px-3 rounded-md">Inicio</a>
                            </li>
                            <li class="mx-6">
                                <a href="{{route('homealumno.examenes')}}" class="font-semibold hover:bg-gray-600 py-3 px-3 rounded-md">Examenes Disponibles</a>
                            </li>
                            <li class="mx-6">
                                <a href="{{route('homealumno.resultado')}}" class="font-semibold hover:bg-gray-600 py-3 px-3 rounded-md">Tus resultados</a>
                            </li>
                        @else
                            <li class="mx-6">
                                <a href="{{route('homedocente.index')}}" class="font-semibold hover:bg-gray-600 py-3 px-3 rounded-md">Inicio</a>
                            </li>
                            <li class="mx-6">
                                <a href="{{route('homedocente.examenes')}}" class="font-semibold hover:bg-gray-600 py-3 px-3 rounded-md">Tus examenes</a>
                            </li>
                            <li class="mx-6">
                                <a href="{{route('homedocente.resultados')}}" class="font-semibold hover:bg-gray-600 py-3 px-4 rounded-md">Resultados</a>
                            </li>
                        @endif
                @endif
            </ul>
        </div>

    </nav>
    @yield('content')
    @yield('js')
</body>
</html>