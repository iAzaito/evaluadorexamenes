<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use App\Models\CredentialsExamen;
use App\Models\Examenes;
use App\Models\Preguntas;
use App\Models\Resultados;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;

class HomeDocenteController extends Controller
{
    public function index(){
        return view('auth.homedocente');
    }

    public function examenes(){
        $id = auth()->user()->id;
        $examenes = Examenes::all()->where('id_user',$id);

        return view('auth.examenesdocente', compact('examenes'));
    }

    public function crearexamen(){
        return view('auth.examencredentials');
    }

    public function crearpreguntas(){
        return view('auth.examenpreguntas');
    }

    public function storeCredentialsExamen(Request $request){
        $this->validate(request(),[
            'titulo' => 'required',
        ]);
        $examen = new Examenes();
        $examen->titulo=$request->titulo;
        $examen->id_user=$request->id_user;

        $examen->save();

        $idExamen = $examen->idExamen;

        return view('auth.examenpreguntas', compact('idExamen'));
    }


    public function storecrearpreguntas(Request $request){

        $preguntas = new Preguntas();
        $preguntas->pregunta=$request->pregunta;
        $preguntas->opcion1=$request->opcion1;
        $preguntas->opcion2=$request->opcion2;
        $preguntas->opcion3=$request->opcion3;
        $preguntas->correcta=$request->correcta;
        $preguntas->idExamen=$request->idExamen;

        $preguntas->save();

        $idExamen = $preguntas->idExamen;
        return view('auth.examenpreguntas', compact('idExamen'))->with('add','pregunta');
    }

    public function destroy($id){
        $examen = Examenes::find($id);
        $examen->delete();

        $id = auth()->user()->id;
        $examenes = Examenes::all()->where('id_user',$id);

        return redirect()->route('homedocente.examenes', ['examenes' => $examenes]);
    }

    public function editarexamen($id){
        $idExamen = $id;
        $examen = Preguntas::all()->where('idExamen',$idExamen);
        $examentitulo = Examenes::all()->where('idExamen',$idExamen);
        return view('auth.preguntasdocente',compact('examentitulo','examen'));
    }

    public function eliminarpregunta($id){
        $pregunta = Preguntas::find($id);
        $idExamen = $pregunta->idExamen;
        $cantidad = Preguntas::all()->where('idExamen',$idExamen)->count();

        $examen = Preguntas::all()->where('idExamen',$idExamen);
        $examentitulo = Examenes::all()->where('idExamen',$idExamen);

        if($cantidad>5){
            $pregunta->delete();
            return redirect()->route('homedocente.editarexamen', ['examen' => $examen, 'examentitulo' => $examentitulo, $idExamen]);
        }
        return redirect()->route('homedocente.editarexamen', ['examen' => $examen, 'examentitulo' => $examentitulo, $idExamen]);
    }

    public function agregarpregunta($id){
        $idExamen=$id;
        return view('auth.agregarnuevapregunta',compact('idExamen'));
    }

    public function guardarnuevapregunta(Request $request){

        $this->validate(request(),[
            'pregunta' => 'required',
            'opcion1' => 'required',
            'opcion2' => 'required',
            'opcion3' => 'required',
            'correcta' => 'required',
        ]);
        $preguntas = new Preguntas();
        $preguntas->pregunta=$request->pregunta;
        $preguntas->opcion1=$request->opcion1;
        $preguntas->opcion2=$request->opcion2;
        $preguntas->opcion3=$request->opcion3;
        $preguntas->correcta=$request->correcta;
        $preguntas->idExamen=$request->idExamen;

        $preguntas->save();

        $idExamen = $preguntas->idExamen;

        return redirect()->route('homedocente.agregarpregunta', [$idExamen]);
    }

    public function editarpregunta($id){
        $idPregunta = $id;
        $pregunta = Preguntas::all()->where('idPregunta',$idPregunta);
        return view('auth.editarpregunta',compact('pregunta'));
    }

    public function update(Request $request, Preguntas $pregunta){
        $this->validate(request(),[
            'pregunta' => 'required',
            'opcion1' => 'required',
            'opcion2' => 'required',
            'opcion3' => 'required',
            'correcta' => 'required',
        ]);

        $pregunta->pregunta=$request->pregunta;
        $pregunta->opcion1=$request->opcion1;
        $pregunta->opcion2=$request->opcion2;
        $pregunta->opcion3=$request->opcion3;
        $pregunta->correcta=$request->correcta;
        $pregunta->idExamen=$request->idExamen;

        $pregunta->save();

        $idExamen=$pregunta->idExamen;
        $examen = Preguntas::all()->where('idExamen',$idExamen);
        $examentitulo = Examenes::all()->where('idExamen',$idExamen);
        return redirect()->route('homedocente.editarexamen', ['examen' => $examen, 'examentitulo' => $examentitulo, $idExamen]);
    }

    public function resultados(){
        $idDocente = auth()->user()->id;
        $resultados = Resultados::all()->where('idDocente',$idDocente);
        return view('auth.resultado',compact('resultados'));
    }

    public function createPDF(){
        $dompdf = App::make("dompdf.wrapper");
        $idDocente= auth()->user()->id;
        $resultados = Resultados::all()->where('idDocente',$idDocente);
        $dompdf->loadView('pdf.generarpdfdocente',compact('resultados'))->setOptions(['defaultFont' => 'sans-serif']);
        return $dompdf->download('reportedocente.pdf');
    }

}
