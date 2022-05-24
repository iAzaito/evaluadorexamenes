@extends('layouts.plantilla')

@section('title','Resultados')

@section('content')

<div class="bg-white w-3/4 h-3/4 m-auto mt-8 flow-root shadow rounded relative">
    <div class='border border-2px h-10 bg-blue-400 text-center flow-root'>
        <label class='font-bold ml-20 text-2xl text-white text-center mr-40'>Resultados</label>
       @if (auth()->check())
            @if (auth()->user()->tipoUsuario == 'Alumno')
            <a href="{{route('homealumno.pdf')}}">
                <button class='float-left ml-2 bg-red-600 text-white hover:bg-gray-300 shadow rounded mt-1 py-1 px-3'>
                    PDF
                </button>
            </a>
            @else
            <a href="{{route('homedocente.pdf')}}">
                <button class='float-left bg-red-600 text-white hover:bg-gray-300 shadow rounded mt-1 py-1 px-3 ml-2'>
                    PDF
                </button>
            </a>
            @endif
            
       @endif
    </div>
    <div class="relative overflow-x-auto shadow-md flow-root relative text-center sm:rounded-lg mt-5">
        <table class="w-3/4 m-auto shadow rounded text-sm text-left text-gray-500 dark:text-gray-400 mb-5">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                  <th scope="col" class="px-10 py-3">Alumno</th>
                  <th scope="col" class="px-10 py-3">Examen</th>
                  <th scope="col" class="px-10 py-3">Intentos</th>
                  <th scope="col" class="px-10 py-3">Promedio</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($resultados as $resultado)
                  <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50  bg-gray-300 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
                    <th class="px-6 py-4 font-medium">
                        {{$resultado->alumno}}
                    </th>
                    <td class="px-6 py-4 font-medium">
                        {{$resultado->tituloExamen}}
                    </td>
                    <td class="px-6 py-4 font-medium">
                        {{$resultado->intentos}}
                    </td>
                    <td class="px-6 py-4 font-medium">
                        {{$resultado->promedio}}
                    </td>
                </tr>
                  @endforeach
              </tbody>
        </table>
    </div>
</div>
    
@endsection