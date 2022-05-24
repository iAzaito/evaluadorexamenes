@extends('layouts.plantilla')

@section('title','Home Docente')

@section('content')

<div class="welcome-content">
    <img src="{{ asset('imagenes/pizarra2.jpg') }}" class="welcome-image"/>
        <div class="user">
            <h3>Hola {{auth()->user()->tipoUsuario}}: {{auth()->user()->nombre}}</h3>
        </div>
</div>
    
@endsection