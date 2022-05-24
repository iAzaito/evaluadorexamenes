<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\Environment\Console;

class SessionsController extends Controller
{
    //CARGA VISTA DE LOGIN
    public function create(){
        return view('auth.login');
    }


    public function store(){
        if(auth()->attempt(request(['email','password'])) == false){
            return back()->withErrors([
                'message' => 'Correo o Contraseña incorrectas, intenta de nuevo',
            ]);
        }else{
            if(auth()->user()->tipoUsuario == 'Alumno'){
                return redirect()->to('/homealumno');
            }
    
            if(auth()->user()->tipoUsuario == 'Docente'){
                return redirect()->to('/homedocente');
            }
        }
        
    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
    
}
