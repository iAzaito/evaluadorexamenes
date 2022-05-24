@extends('layouts.plantilla')

@section('title','Preguntas')

@section('content')

<form action="{{route('homealumno.respuestasexamen')}}"  method="POST">
    @csrf
    <div class='bg-slate-300 w-full h-full'>
        <div class='bg-white w-3/4 h-9/10 m-auto mt-5 shadow-xl rounded'>
            <div class='border border-2px h-11 bg-blue-400 flow-root'>
                @foreach ($examentitulo as $titulo)
                    <label class='font-bold text-center float-left ml-5 mt-1 text-xl'>{{$titulo->titulo}}</label>
                    <input hidden name="idExamen" value="{{$titulo->idExamen}}">
                    <input hidden name="titulo" value="{{$titulo->titulo}}">
                    <input hidden name="iduser" value="{{$titulo->id_user}}">
                @endforeach

                <a class="float-right" href="{{route('homealumno.examenes')}}">
                   <button type="button" class="bg-red-600 text-white hover:bg-gray-300 py-1 px-3 mt-1 shadow rounded mr-2">Salir</button>
                </a>

                <button type="submit" class='float-right bg-red-600 text-white hover:bg-gray-300 py-1 px-3 mt-1 shadow rounded mr-2'>
                    Terminar
                </button>
        </div>
        <div>
               @foreach ($pregunta as $index => $preguntas)
                    <div>
                        <label class='font-bold ml-2 text-xl'>{{$index+1}}. {{$preguntas->pregunta}}</label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion1}}" name="pregunta{{$index+1}}" type="radio" /> {{$preguntas->opcion1}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion2}}" name="pregunta{{$index+1}}" type="radio" /> {{$preguntas->opcion2}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion3}}" name="pregunta{{$index+1}}" type="radio"/> {{$preguntas->opcion3}}
                        </label>
                        <br>
                        <input name="correcta{{$index+1}}" value="{{$preguntas->correcta}}" hidden>
                        <input name="id{{$index+1}}" value="{{$preguntas->idPregunta}}" hidden>
                    </div>
                    <hr>
               @endforeach    
        </div>
    </div>
</form>
@endsection()