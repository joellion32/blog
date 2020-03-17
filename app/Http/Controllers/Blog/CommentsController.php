<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarcomentario(Request $request)
    {
    
        $comentario = new Comment();
        $id = $request->input('post_id');
        $comentario->post_id = $request->input('post_id');
        $comentario->nombre_usuario = $request->input('nombre');
        $comentario->email = $request->input('email');
        $comentario->comentario = $request->input('comentario');
        $comentario->save();
        return redirect()->route('detalle', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario = Comment::find($id);
        if($comentario->delete($id)){
            flash('Comentario eliminado correctamente')->success();
        }else{
            flash('Error al eliminar comentario')->danger();
        }
        return redirect()->route('panel');
    }
}
