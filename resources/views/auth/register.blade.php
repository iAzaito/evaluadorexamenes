@extends('layouts.app')

@section('title','Registrar')

@section('content')

<div class='bg-slate-300 h-screen text-black flex'>
    <div class='w-full max-w-xs m-auto'>
        <form class='bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4'>

            {{-- INPUT NOMBRE --}}
            <div class='mb-4 relative'>
                <label htmlFor='nombre' class='block text-gray-700 text-sm font-fold mb-2'>Nombre</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='text' name='nombre' placeholder='Ingresa tu nombre'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">person</i>
                    </div>
                </div>
            </div>
            {{---------------------------------------------------------------------------------}}

            {{-- INPUT USUARIO--}}
            <div class='mb-4 relative'>
                <label htmlFor='usuario' class='block text-gray-700 text-sm font-fold mb-2'>Usuario</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='text' name='usuario' placeholder='Ingresa tu usuario'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">account_circle</i>
                    </div>
                </div>
            </div>
            {{---------------------------------------------------------------------------------}}

            {{-- INPUT TIPO USUARIO --}}
            <div class='mb-4 relative'>
                <label htmlFor='tipoUsuario' class='block text-gray-700 text-sm font-fold mb-2'>Tipo de Usuario</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <select name='tipoUsuario' id='tipoUsuario' class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                            <option value='Docente'>Docente</option>
                            <option value='Alumno'>Alumno</option>
                        </select>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">group</i>
                    </div>
                </div>
            </div>
            {{---------------------------------------------------------------------------------}}

            {{-- INPUT CONTRASEÑA--}}
            <div class='mb-4 relative'>
                <label htmlFor='password' class='block text-gray-700 text-sm font-fold mb-2'>Contraseña</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='password' name='password' id='password'
                        placeholder='*******' class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">verified_user</i>
                    </div>
                </div>
            </div>
            {{---------------------------------------------------------------------------------}}

            {{-- BOTÓN REGISTRAR --}}
            <a><button class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full'>Registrar</button></a>
        </form>
            {{-- BOTÓN LOGIN --}}
            <p class='my-2 text-sm flex justify-center px-3 '>¿Ya tienes una cuenta?</p>
            <a href="http://localhost/simuladorexamenes/public/login"><button onClick={handleNavigate} class='bg-slate-50 hover:bg-slate-200 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-full'>Iniciar Sesión</button>
            </a>
    </div>
</div>

@endsection()