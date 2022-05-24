@extends('layouts.plantilla')

@section('title','Examenes')

<style>
    .card{
    width: 220px;
    height: auto;
    overflow: hidden;
    box-shadow: 0px 0px 20px 2px;
    transition: 0.3s;
    animation: ease-in;
    margin-left: 30px;
    float: left;
    margin-top: 20px;
    text-align: center;
    margin-bottom: 180px;
    }
</style>

@section('content')

        <div class='w-3/4 bg-white h-3/4 m-auto mt-5 rounded relative flow-root flex shadow-xl'>
            <div class='border border-2px h-11 bg-blue-400 text-center'>
                <label class='font-bold mr-20 text-2xl text-center mt-1 m-auto'>Exámenes</label>
                    <a href="{{route('homedocente.crearexamen')}}" class='float-left mt-1'>
                        <button class="bg-red-700 hover:bg-gray-300 shadow rounded py-1 px-2 text-white ml-2">Nuevo examen</button>
                    </a>
            </div>
            <div class="divcontenedor">
                @foreach ($examenes as $examen)
                <div class="mb-3 card">
                    <div class="bg-gray-300 w-full shadow rounded flow-root">
                        <div class="text-center">
                            <p class="font-bold text-2xl">Examen</p>
                            <h3 class="font-serif">{{$examen->titulo}}</h3>
                        </div>
                        <br>
                        <a href="{{route('homedocente.editarexamen',$examen)}}">
                            <button class="bg-blue-600 shadow rounded hover:bg-blue-200 py-1 px-5 float-left text-white ml-2">
                                Editar
                            </button>
                        </a>
                        <form action="{{route('homedocente.examendestroy',$examen)}}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" class="bg-blue-600 shadow rounded hover:bg-blue-200 py-1 px-3 float-right text-white mr-2">
                                    Eliminar
                                </button>
                        </form>
                        <br>
                        <br>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection()

