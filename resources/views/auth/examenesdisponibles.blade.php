@extends('layouts.plantilla')

@section('title','Examenes Disponibles')

<style>
    .card{
    width: 220px;
    height: auto;
    overflow: hidden;
    box-shadow: 0px 0px 20px 2px ;
    transition: 0.3s;
    animation: ease-in;
    margin-left: 30px;
    float: left;
    margin-top: 20px;
    text-align: center;
    margin-bottom: 120px;
}
    }
</style>

@section('content')

<div class='w-3/4 bg-white h-3/4 m-auto mt-5 shadow-xl rounded relative flow-root flex'>
    <div class='border border-2px h-9 bg-blue-400 text-center'>
        <label class='font-bold text-white ml-2 text-2xl text-center'>Exámenes Disponibles</label>
    </div>
    <div>
        @foreach ($examenes as $examen)
            <div class="mb-3 card">
                <div  class="bg-gray-300 w-full shadow rounded flow-root">
                    <div class="text-center">
                        <p class="font-bold text-2xl">Examen</p>
                        <h3 class="font-serif">{{$examen->titulo}}</h3>
                    </div>
                    <br>
                    <div class="ml-14">
                        <a href="{{route('homealumno.preguntasexamen',$examen)}}">
                            <button class="bg-blue-600 shadow rounded hover:bg-blue-200 py-1 px-4 float-left text-white mb-5">
                                Ver examen
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection()