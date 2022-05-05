@extends('layouts.app')

@section('title', 'Login')


@section('content')

<div class='bg-slate-300 h-screen text-black flex'>
    <div class="w-full max-w-xs m-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 m-auto">
            
            {{-- Input del usuario--}}
            <div class='mb-4 relative'>
                <label htmlFor='usuario' class='block text-gray-700 text-sm font-fold mb-2'>Usuario</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='text' name='usuario' placeholder='Ingresa tu usuario'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                    </div>
                    <div class=' absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">account_circle</i>
                    </div>
                </div>
            </div>
            {{-----------------------------------------------------------}}

            {{-- Input de la contraseña--}}
            <div class='mb-4 relative'>
                <label htmlFor='password' class='block text-gray-700 text-sm font-fold mb-2'>Contraseña</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='password' name='password' id='password'
                        placeholder='*******' class='shadow appearence-none border rounded w-full py-2 pr-3 pl-10 px-4.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                    </div>
                    <div class=' absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">verified_user</i>
                    </div>
                </div>
            </div>
            {{-----------------------------------------------------------}}

            {{-- BOTÓN LOGIN --}}
            <button class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 mt-3 rounded focus:outline-none focus:shadow-outline w-full'>Iniciar Sesión
            </button>
        </form>
            {{-- BOTÓN REGISTRAR --}}
            <p class='my-2 text-sm flex justify-center px-3 '>¿No tienes una cuenta?</p>
            <a href="http://localhost/simuladorexamenes/public/register">
                <button class="bg-slate-50 hover:bg-slate-200 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-full">Crear Cuenta
                </button>
            </a>
            
    </div>
</div>

<script>
    function registrar(){
        window.location.href='register';
    }
</script>


@endsection()