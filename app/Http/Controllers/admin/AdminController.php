<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\User;
use App\Post;
use App\Category;
use App\Sub_Category;

class AdminController extends Controller
{
    public function panel()
    {
        // comentarios 
        $comentarios = Comment::orderBy('id', 'DESC')->paginate(5);
        $categorias = Category::orderBy('id', 'DESC')->paginate(5);

        // para los graficos
        $vistas = Post::all()->pluck('vistas')->sum();
              
        $comentario = Comment::all();

        $sub_categorias = Sub_Category::orderBy('id', 'DESC')->get();
      
        return view('admin.dashboard', compact('comentarios', 'categorias', 'comentario', 'vistas', 'sub_categorias'));
    }


    public function perfil($id)
    {
      $usuario = User::find($id);
      return view('admin.perfil');
    }

    public function actualizarperfil(Request $request, $id)
    {
        $usuario = User::find($id);
        $usuario->name = $request->input('nombre');
        $usuario->email = $request->input('email');
        $usuario->update();

        flash('Perfil Actualizado Correctamente')->success();
        return redirect()->route('perfil', ['id' => $id]);
    }

    public function posts()
    {
      $post = Post::all();
      $comentarios = Comment::all();
      return view('admin.posts', compact('post', 'comentarios'));
    }

    public function crearusuario()
    {
      return view('admin.crear_usuario');
    }


    public function editarcarrousel(){

      $post = Post::orderBy('id', 'DESC')->get();

      return view('admin.carrousel', compact('post'));
    }

}
