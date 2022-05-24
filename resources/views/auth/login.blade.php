@extends('layouts.app')

@section('title', 'Inicio de sesión')

@section('content')

<div id="div1" class=' h-screen text-black flex bg-blue-200'>
    <div class="w-full max-w-xs m-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 m-auto" method="POST" action="">
            
            @csrf
            {{-- Input del email--}}
            <div class='mb-4 relative'>
                <label htmlFor='email' class='block text-gray-700 text-sm font-fold mb-2'>Correo</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='email' name='email' placeholder='Ingresa tu correo'
                        class='shadow appearence-none border rounded w-full py-2 px-1 pr-4.5 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                    </div>
                </div>
            </div>
            {{-----------------------------------------------------------}}

            {{-- Input de la contraseña--}}
            <div class='mb-4 relative flow-root'>
                <label htmlFor='password' class='block text-gray-700 text-sm font-fold mb-2'>Contraseña</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='password' name='password' id='password'
                        placeholder='*******' class='shadow appearence-none border rounded w-full py-2 pr-3 pl-2 px-4.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                    </div>
                </div>
            </div>
            {{---------------------------------------------------------------------------------}}

            {{-- MENSAJE DE ERROR--}}

            @error('message')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>
            @enderror
            {{---------------------------------------------------------------------------------}}

            {{-- BOTÓN LOGIN --}}
            <button class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 mt-3 mb-3 rounded focus:outline-none focus:shadow-outline w-full'>Iniciar Sesión
            </button>
            
        </form>
            <br>
            {{-- BOTÓN REGISTRAR --}}
            <a class="mt-5" href="{{route('register.index')}}">
                <button class="bg-white hover:bg-blue-400 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-full">Crear Cuenta
                </button>
            </a>
    </div>
</div>

@endsection()