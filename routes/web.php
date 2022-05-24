<?php

use App\Http\Controllers\HomeAlumnoController;
use App\Http\Controllers\HomeDocenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//RUTA PRINCIPAL DE LOGIN PARA CARGAR LA VISTA
Route::get('/', [SessionsController::class, 'create'])->name('login.index');

//RUTA PARA RECUPERAR DATOS DEL FORMULARIO DEL LOGIN
Route::post('/', [SessionsController::class, 'store'])->name('login.store');

//DESTRUIR INICIO DE SESIÓN AL PRESIONAR CERRAR SESIÓN
Route::get('/logout', [SessionsController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');

//RUTA PARA CARGAR LA VISTA DE REGISTRAR
Route::get('/register', [RegisterController::class, 'create'])->name('register.index');

//RUTA PARA CREAR UNA CUENTA A UN USUARIO
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//-------------------------------------------------------------------------------------------

//RUTA PARA CARGAR EL HOME DEL ALUMNO
Route::get('/homealumno', [HomeAlumnoController::class, 'index'])
->name('homealumno.index')
->middleware('auth.alumno');

//RUTA PARA CARGAR LOS EXAMENES DISPONIBLES PARA EL ALUMNO
Route::get('/homealumno/examenes-disponibles', [HomeAlumnoController::class, 'examenesdisponibles'])
->name('homealumno.examenes')
->middleware('auth.alumno');

//CARGAR PREGUNTAS DEL EXAMEN SELECCIONADO
Route::get('/homealumno/examenes-disponibles/preguntas-del-examen/{id}', [HomeAlumnoController::class, 'preguntasexamen'])
->name('homealumno.preguntasexamen')
->middleware('auth.alumno');

//VALIDAR RESPUESTAS DEL EXAMEN
Route::post('/homealumno/examenes-disponibles/preguntas-del-examen/responder-preguntas', [HomeAlumnoController::class, 'respuestasexamen'])->name('homealumno.respuestasexamen')
->middleware('auth.alumno');

Route::get('/homealumno/resultados/alumno', [HomeAlumnoController::class, 'resultado'])
->name('homealumno.resultado')
->middleware('auth.alumno');

Route::get('/homealumno/resultados/generarpdf/alumno', [HomeAlumnoController::class, 'createPDF'])->name('homealumno.pdf');

Route::get('/homealumno/resultados/evaluación', [HomeAlumnoController::class, 'evaluar'])
->name('homealumno.evaluacion')
->middleware('auth.alumno');


Route::post('/homealumno/resultados/evaluación', [HomeAlumnoController::class, 'evaluacion'])
->name('homealumno.evaluacion')
->middleware('auth.alumno');



//-----------------------------------------------------------------------------------------------

Route::get('/homedocente', [HomeDocenteController::class, 'index'])
->name('homedocente.index')
->middleware('auth.docente');

Route::get('/homedocente/examenes-docente', [HomeDocenteController::class, 'examenes'])
->name('homedocente.examenes')
->middleware('auth.docente');

Route::get('/homedocente/examenes-docente/nuevo-examen', [HomeDocenteController::class, 'crearexamen'])
->name('homedocente.crearexamen')
->middleware('auth.docente')->middleware('auth.docente');

Route::post('/homedocente/examenes-docente/nuevo-examen/guardar-examen', [HomeDocenteController::class, 'storecredentialsexamen'])->name('homedocente.createexamen')
->middleware('auth.docente');

Route::get('/homedocente/examenes-docente/nuevo-examen/crear-preguntas-examen', [HomeDocenteController::class, 'crearpreguntas'])
->name('homedocente.crearpreguntas')
->middleware('auth.docente');

Route::post('/homedocente/examenes-docente/nuevo-examen/guardar-preguntas-examen', [HomeDocenteController::class, 'storecrearpreguntas'])
->name('homedocente.crearpreguntasexamen')
->middleware('auth.docente');

Route::delete('/homedocente/examenes-docente/examen/{id}', [HomeDocenteController::class, 'destroy'])
->name('homedocente.examendestroy')
->middleware('auth.docente');

Route::get('/homedocente/examenes-docente/examen/editar-examen/{id}', [HomeDocenteController::class, 'editarexamen'])->name('homedocente.editarexamen')
->middleware('auth.docente');

Route::delete('/homedocente/examenes-docente/examen/editar-examen/eliminar/{id}', [HomeDocenteController::class, 'eliminarpregunta'])
->name('homedocente.eliminarpregunta')
->middleware('auth.docente');

Route::get('/homedocente/examenes-docente/examen/editar-examen/agregar-pregunta/{id}', [HomeDocenteController::class, 'agregarpregunta'])
->name('homedocente.agregarpregunta')
->middleware('auth.docente');

Route::post('/homedocente/examenes-docente/examen/editar-examen/agregar-pregunta', [HomeDocenteController::class, 'guardarnuevapregunta'])
->name('homedocente.guardarnuevapregunta')
->middleware('auth.docente');

Route::get('/homedocente/examenes-docente/examen/editar-examen/editar-pregunta/{id}', [HomeDocenteController::class, 'editarpregunta'])
->name('homedocente.editarpregunta')
->middleware('auth.docente');

Route::put('/homedocente/examenes-docente/examen/editar-examen/editar-pregunta/{pregunta}',[HomeDocenteController::class, 'update'])
->name('homedocente.updatepregunta')
->middleware('auth.docente');

Route::get('/homedocente/resultados/docente', [HomeDocenteController::class, 'resultados'])
->name('homedocente.resultados')
->middleware('auth.docente');

Route::get('/homedocente/resultados/generar-pdf/docente', [HomeDocenteController::class, 'createPDF'])
->name('homedocente.pdf')
->middleware('auth.docente');