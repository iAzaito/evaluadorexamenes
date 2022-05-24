@extends('layouts.app')

@section('title','Registrar cuenta')

@section('content')

<div id="div1" class='h-screen text-black flex bg-blue-200'>
    <div class='w-full max-w-xs m-auto'>
        <form class='bg-white shadow-md rounded px-8 pt-2 pb-5 mb-4' method="POST" action="">

            @csrf
            {{-- INPUT NOMBRE --}}
            <div class='mb-4 relative'>
                <label htmlFor='nombre' class='block text-gray-700 text-sm font-fold mb-2'>Nombre</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='text' name='nombre' placeholder='Ingresa tu nombre'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' required>
                    </div>
                </div>
            </div>

            {{-- INPUT USUARIO--}}
            <div class='mb-4 relative'>
                <label htmlFor='usuario' class='block text-gray-700 text-sm font-fold mb-2'>Usuario</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='text' name='usuario' placeholder='Ingresa tu usuario'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' required>
                    </div>
                </div>
            </div>
            @error('usuario')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
            @enderror
            {{---------------------------------------------------------------------------------}}

            {{-- SELECT TIPO USUARIO --}}
            <div class='mb-4 relative'>
                <label htmlFor='tipoUsuario' class='block text-gray-700 text-sm font-fold mb-2'>Tipo de Usuario</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <select name='tipoUsuario' id='tipoUsuario' class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                            <option value='Docente'>Docente</option>
                            <option value='Alumno'>Alumno</option>
                        </select>
                    </div>
                </div>
            </div>
            {{---------------------------------------------------------------------------------}}
            {{-- INPUT EMAIL --}}
            <div class='mb-4 relative'>
                <label htmlFor='email' class='block text-gray-700 text-sm font-fold mb-2'>Correo</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='email' name='email' placeholder='Ingresa tu correo'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' required>
                    </div>
                </div>
            </div>
            @error('email')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
            @enderror
            {{---------------------------------------------------------------------------------}}

            {{-- INPUT CONTRASEÑA--}}
            <div class='mb-4 relative'>
                <label htmlFor='password' class='block text-gray-700 text-sm font-fold mb-2'>Contraseña</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='password' name='password' id='password'
                        placeholder='*******' class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' required>
                    </div>
                </div>
            </div>

            {{-- BOTÓN REGISTRAR --}}
            <a><button type="submit" class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full'>Registrar</button></a>
        </form>
            {{-- BOTÓN LOGIN --}}
            <a href="{{route('login.index')}}"><button class='bg-white hover:bg-blue-400 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-full'>Iniciar Sesión</button>
            </a>
    </div>
</div>

@endsection()