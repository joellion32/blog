<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notificacion;

class NotificacionesController extends Controller
{
    public function index(){
        $notificaciones = Notificacion::orderBy('id', 'DESC')->paginate(10);
    
        return view('admin.notificaciones', compact('notificaciones'));
    }

    public function guardar(Request $request)
    {
        $notificaciones = new Notificacion();
        $notificaciones->nombre = $request->input('nombre');
        $notificaciones->email = $request->input('email');
        $notificaciones->titulo = $request->input('titulo');
        $notificaciones->mensaje = $request->input('mensaje');
        $notificaciones->save();

        flash('Mensaje enviado correctamente. Gracias por contactarnos')->success();

        return redirect('contacto');
    }

    public function eliminar($id){
     $notificaciones = Notificacion::find($id);
     $notificaciones->delete();

     
     flash('notificacion eliminada correctamente')->success();

     return redirect('notificaciones');
    }
}
