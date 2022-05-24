<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use App\Models\Examenes;
use App\Models\Preguntas;
use App\Models\Resultados;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;


class HomeAlumnoController extends Controller
{
    //CARGAR LA VISTA HOME ALUMNO
    public function index(){
        return view('auth.homealumno');
    }

    public function examenesdisponibles(){
        $examenes = Examenes::all();
        return view('auth.examenesdisponibles', compact('examenes'));
    }

    public function preguntasexamen($id){
        $idExamen = $id;
        $pregunta = Preguntas::where('idExamen',$idExamen)->inRandomOrder()->limit(5)->get();
        $examentitulo = Examenes::all()->where('idExamen',$idExamen);

        return view('auth.responderpreguntas', compact('pregunta','examentitulo'));
    }

    public function respuestasexamen(Request $request){

        $id1 = $request->id1;
        $id2 = $request->id2;
        $id3 = $request->id3;
        $id4 = $request->id4;
        $id5 = $request->id5;

        $resp1 = $request->pregunta1;
        $resp2 = $request->pregunta2;
        $resp3 = $request->pregunta3;
        $resp4 = $request->pregunta4;
        $resp5 = $request->pregunta5;

        $calificacion = 0;
        $correctas = 0;

        //VALIDAR PRIMER PREGUNTA
        if($request->correcta1 == $request->pregunta1 && $request->correcta1 != "" && $request->pregunta1 !=""){
            $correctas++;
            $calificacion = $calificacion + 20;
        }

        //VALIDAR SEGUNDA PREGUNTA
        if($request->correcta2 == $request->pregunta2 && $request->correcta2 != "" && $request->pregunta2!=""){
            $correctas++;
            $calificacion = $calificacion + 20;
        }

        //VALIDAR TERCER PREGUNTA
        if($request->correcta3 == $request->pregunta3 && $request->correcta3 != "" && $request->pregunta3 !=""){
            $correctas++;
            $calificacion = $calificacion + 20;
        }

        //VALIDAR CUARTA PREGUNTA
        if($request->correcta4 == $request->pregunta4 && $request->correcta4 != "" && $request->pregunta4 !=""){
            $correctas++;
            $calificacion = $calificacion + 20;
        }

        //VALIDAR QUINTA PREGUNTA
        if($request->correcta5 == $request->pregunta5 && $request->correcta5 != "" && $request->pregunta5 !=""){
            $correctas++;
            $calificacion = $calificacion + 20;
        }
        
        $idExamen = $request->idExamen;
        $idAlumno = auth()->user()->id;
        $alumno = auth()->user()->nombre;

        if(Resultados::where('idExamen',$idExamen)->where('idAlumno',$idAlumno)->exists()){

            $intento = Resultados::where('idExamen',$idExamen)->where('idAlumno',$idAlumno)->get();

            foreach ($intento as  $datos) {
                $intentos = $datos->intentos;
                $idResultado = $datos->id;
            }

            //GUARDAMOS CALIFICACIÓN
            $calificaciones = new Calificaciones();
            $calificaciones->idResultado = $idResultado;
            $calificaciones->idAlumno = $idAlumno;
            $calificaciones->idDocente = $request->iduser;
            $calificaciones->calificacion = $calificacion;
            $calificaciones->save();

            //sacar promedio
            $promedios = Calificaciones::where('idResultado',$idResultado)->get();
            $cali = 0;
            $totalCal = 0;
            foreach ($promedios as $value) {
                $totalCal++;
                $cali = $cali + $value->calificacion;
            }

            $promedio = ($cali/$totalCal);
            
            $intentos = $intentos+1;

            $resultado = Resultados::find($idResultado);
            $resultado->idAlumno = $idAlumno;
            $resultado->alumno = $alumno;
            $resultado->idDocente = $request->iduser;
            $resultado->idExamen = $request->idExamen;
            $resultado->tituloExamen = $request->titulo;
            $resultado->intentos = $intentos;
            $resultado->promedio = $promedio;
            $resultado->save();
            
        }else{
            $resultado = new Resultados();
            $resultado->idAlumno = $idAlumno;
            $resultado->alumno = $alumno;
            $resultado->idDocente = $request->iduser;
            $resultado->idExamen = $request->idExamen;
            $resultado->tituloExamen = $request->titulo;
            $resultado->intentos = 1;
            $resultado->promedio = $calificacion;
            $resultado->save();

            $idResultado = $resultado->id;
            $calificaciones = new Calificaciones();
            $calificaciones->idResultado = $idResultado;
            $calificaciones->idAlumno = $idAlumno;
            $calificaciones->idDocente = $request->iduser;
            $calificaciones->calificacion = $calificacion;
            $calificaciones->save();
        } 
        return view('auth.resultadoexamen',compact('correctas','id1','id2','id3','id4','id5','resp1','resp2','resp3','resp4','resp5'));
    }

    public function resultado(){
        $idAlumno = auth()->user()->id;
        $resultados = Resultados::all()->where('idAlumno',$idAlumno);
        $calificaciones = Calificaciones::all()->where('idAlumno',$idAlumno);
        return view('auth.resultado',compact('resultados','calificaciones'));
    }

    public function createPDF(){
        $dompdf = App::make("dompdf.wrapper");
        $idAlumno = auth()->user()->id;
        $resultados = Resultados::all()->where('idAlumno',$idAlumno);
        $dompdf->loadView('pdf.generarpdf',compact('resultados'))->setOptions(['defaultFont' => 'sans-serif']);;
        return $dompdf->download('reporteAlumno.pdf');
    }

    public function evaluar(){
        return view('auth.evaluacion');
    }

    public function evaluacion(Request $request){
        $id1 = $request->id1;
        $id2 = $request->id2;
        $id3 = $request->id3;
        $id4 = $request->id4;
        $id5 = $request->id5;

        $resp1 = $request->resp1;
        $resp2 = $request->resp2;
        $resp3 = $request->resp3;
        $resp4 = $request->resp4;
        $resp5 = $request->resp5;

        $pregunta1 = Preguntas::all()->where('idPregunta',$id1);
        $pregunta2 = Preguntas::all()->where('idPregunta',$id2);
        $pregunta3 = Preguntas::all()->where('idPregunta',$id3);
        $pregunta4 = Preguntas::all()->where('idPregunta',$id4);
        $pregunta5 = Preguntas::all()->where('idPregunta',$id5);

        return view('auth.evaluacion', compact('pregunta1','pregunta2','pregunta3','pregunta4','pregunta5','resp1','resp2','resp3','resp4','resp5'));
    }
    
}
