@extends('layouts.plantilla')

@section('title','Home Alumno')

@section('content')
<div class="welcome-content">
    <img src="{{ asset('imagenes/pizarra.jpg') }}" class="welcome-image"/>
        <div class="user">
            <h3 style="color: white">Bienvenido {{auth()->user()->tipoUsuario}}: {{auth()->user()->nombre}}</h3>
        </div>
</div>
    
@endsection