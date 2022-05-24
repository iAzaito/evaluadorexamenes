@extends('layouts.plantilla')

@section('title','Resultados Examen')

@section('content')

<div class='w-1/4 m-auto mt-10 h-2/4'>
        <div class='bg-blue-400 flow-root text-center'>
            <a href="{{route('homealumno.examenes')}}" class='float-right mr-1'>
               <button class="bg-red-600 text-white hover:bg-gray-300 shadow rounded mt-1 py-1 px-3">Salir</button>
            </a>
        </div>
        <div class="w-full bg-gray-200 h-3/4 shadow-xl rounded text-center">
            @if ($correctas == 0)
            <br>
            <br>
            <br>
            <br>
                <label class='text-xl font-bold'>Tu calificación es 0/100</label>
                <br>
                <label class="text-xl font-bold">Respuestas correctas: {{$correctas}}</label>
            <br>
            <br>
            <br>
            <br>
            <br>
            @endif
            @if($correctas == 1)
            <br>
            <br>
            <br>
            <br>
                <label class='text-xl font-bold'>Tu calificación es 20/100</label>
                <br>
                <label class="text-xl font-bold">Respuestas correctas: {{$correctas}}</label>
            <br>
            <br>
            <br>
            <br>
            <br>
            @endif
            @if ($correctas == 2)
            <br>
            <br>
            <br>
            <br>
                <label class='text-xl font-bold'>Tu calificación es 40/100</label>
                <br>
                <label class="text-xl font-bold">Respuestas correctas: {{$correctas}}</label>
            <br>
            <br>
            <br>
            <br>
            <br>
            @endif
            @if ($correctas == 3)
            <br>
            <br>
            <br>
            <br>
                <label class='text-xl font-bold'>Tu calificación es 60/100</label>
                <br>
                <label class="text-xl font-bold">Respuestas correctas: {{$correctas}}</label>
            <br>
            <br>
            <br>
            <br>
            <br>
            @endif
            @if ($correctas == 4)
            <br>
            <br>
            <br>
            <br>
                <label class='text-xl font-bold'>Tu calificación es 80/100</label>
                <br>
                <label class="text-xl font-bold">Respuestas correctas: {{$correctas}}</label>
            <br>
            <br>
            <br>
            <br>
            <br>
            @endif
            @if ($correctas == 5)
            <br>
            <br>
            <br>
            <br>
                <label class='text-xl font-bold'>Tu calificación es 100/100</label>
                <br>
                <label class="text-xl font-bold">Respuestas correctas: {{$correctas}}</label>
            <br>
            <br>
            <br>
            <br>
            <br>
            @endif
    </div>
    <div>
        <form action="{{route('homealumno.evaluacion')}}" method="POST">
            @csrf
            <input type="text" name="id1" value="{{$id1}}" hidden>
            <input type="text" name="id2" value="{{$id2}}" hidden>
            <input type="text" name="id3" value="{{$id3}}" hidden>
            <input type="text" name="id4" value="{{$id4}}" hidden>
            <input type="text" name="id5" value="{{$id5}}" hidden>

            <input type="text" name="resp1" value="{{$resp1}}" hidden>
            <input type="text" name="resp2" value="{{$resp2}}" hidden>
            <input type="text" name="resp3" value="{{$resp3}}" hidden>
            <input type="text" name="resp4" value="{{$resp4}}" hidden>
            <input type="text" name="resp5" value="{{$resp5}}" hidden>
            <button type="submit"  class="bg-red-600 text-white hover:bg-gray-300 shadow rounded mt-1 py-1 px-3">Ver evaluación</button>
        </form>
    </div>
</div>

@endsection()