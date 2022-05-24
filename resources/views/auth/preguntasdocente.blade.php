@extends('layouts.plantilla')

@section('title','Editar Examen')


<style>
    .general{
        justify-content: center;
    }
</style>

@section('content')
    <div class='bg-white-300 w-full'>
        <div class='bg-white w-3/4 h-9/10 m-auto mt-5 shadow-xl rounded'>
            <div class='border border-2px h-12 bg-blue-400 flow-root flex'>
                @foreach ($examentitulo as $element)
                    <label class='font-bold ml-2 ml-100 text-2xl text-white'>{{$element->titulo}}</label>
                    {{--BOTÓN SALIR--}}
                    <a href="{{route('homedocente.examenes')}}" class="float-right mt-1">
                        <button class="bg-red-600 text-white mt-1 py-1 px-3 hover:bg-gray-300 shadow rounded mr-2">Salir</button>
                     </a>
                {{--BOTÓN AGREGAR--}}
                    <a href="{{route('homedocente.agregarpregunta',$element->idExamen)}}" class="float-right mt-1">
                        <button class="bg-red-600 text-white mt-1 py-1 px-3 hover:bg-gray-300 shadow rounded mr-2">Nueva pregunta</button>
                    </a>
                @endforeach
            </div>

            <div style="padding: 15px">
                @foreach ($examen as $examenes)
                <div class="card-titlee">
                    <div class="card-cuestions w-full">
                      <b>
                        <p>{{$examenes->pregunta}}</p>
                      </b>
                    <form action="{{route('homedocente.eliminarpregunta',$examenes)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-blue-600 shadow rounded hover:bg-blue-200 py-1 px-3 float-right text-white">
                            Eliminar
                        </button>
                        <a href="{{route('homedocente.editarpregunta',$examenes)}}">
                            <button type="button" class="bg-blue-600 shadow rounded hover:bg-blue-200 py-1 px-5 float-right mr-1 text-white">
                                Editar
                            </button>
                        </a>
                    </form>
                      </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection()


