<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Category;
use App\Post;
use App\Sub_Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // mostrar las categorias 
        $categorias = Category::orderBy('id', 'ASC')->paginate(5);
        $_SERVER['categorias'] = $categorias;

        // mostrar las sub_categorias 
        $subcategorias = Sub_Category::orderBy('id', 'ASC')->paginate(3);
        $_SERVER['subcategorias'] = $subcategorias;
        

    // mostrar las secciones 
        $secciones = Category::orderBy('id', 'DESC')->get();
    
    // mostrar los posts 
        $posts = Post::search($request->search)->orderBy('id', 'DESC')->paginate(8);

        // post reciente 
        $reciente = Post::orderBy('id', 'DESC')->paginate(1);
        $recientes = Post::orderBy('id', 'DESC')->paginate(3);
    

        return view('posts.index', compact('posts', 'reciente', 'recientes', 'secciones'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();
        $sub_categorias = Sub_Category::all();

        return view('posts.crear', compact('categorias', 'sub_categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validar datos
        $validatedData = $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'cuerpo' => 'required',
        ]);
        
        //recoger datos
        date_default_timezone_get();
        // Asignar valores
        $post = new Post();
        $post->slug = $request->input('titulo');
        $post->titulo = $request->input('titulo');
        $post->categoria_id = $request->input('categoria');
        $post->sub_categoria_id = $request->input('sub_categoria_id');
        $post->usuario_id = \Auth::user()->id;
        $post->cabeza = $request->input('cabecera');
        $post->cuerpo = $request->input('cuerpo');
        $post->fecha = date('y.m.d');

        //subir fichero imagen
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $image_path_name = time().$file->getClientOriginalName();
            $file->move('uploads/', $image_path_name);
            $post->imagen = $image_path_name;
        }

        //subir fichero video
        if($request->hasFile('video')){
            $file = $request->file('video');
            $video_path_name = time().$file->getClientOriginalName();
            $file->move('videos/', $video_path_name);
            $post->video = $video_path_name;
        }

        // mandar mensaje y ridireccionar
        if($post->save()){
            flash('Post creado correctamente')->success();
        }else{
            flash('Error al crear Post')->danger();
        }
        return redirect()->route('crear.post');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // remplazar id por slug
        $id = Post::where('slug', $slug)->pluck('id')->first();

        $post = Post::find($id);
        
          // mostrar las categorias 
            $categorias = Category::orderBy('id', 'ASC')->paginate(5);
          $_SERVER['categorias'] = $categorias;

          // mostrar las sub_categorias 
        $subcategorias = Sub_Category::orderBy('id', 'ASC')->paginate(3);
        $_SERVER['subcategorias'] = $subcategorias;
        
        
        // mostrar las secciones 
        $secciones = Category::orderBy('id', 'ASC')->get();

         // post reciente 
        $reciente = Post::orderBy('id', 'DESC')->paginate(1);
        $recientes = Post::orderBy('id', 'DESC')->paginate(3);

        // mostrar comentarios
        $comentarios = DB::table('comentarios')->where('post_id', '=', $id)->get();

        DB::update('update post set vistas = (vistas + 1) where id = ?', [$id]);
        return view('posts.detalle', compact('post', 'reciente', 'recientes', 'comentarios', 'secciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categorias = Category::all();
        $sub_categorias = Sub_Category::all();

        return view('posts.editar', compact('post', 'categorias', 'sub_categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 $post = Post::find($id);
  $post->slug = $request->input('titulo');
  $post->titulo = $request->input('titulo');
  $post->categoria_id = $request->input('categoria');
  $post->sub_categoria_id = $request->input('sub_categoria_id');
  $post->usuario_id = \Auth::user()->id;
  $post->cabeza = $request->input('cabecera');
  $post->cuerpo = $request->input('cuerpo');
  $post->fecha = date('y.m.d');

  //subir fichero imagen
  if($request->hasFile('imagen')){
      $file = $request->file('imagen');
      $image_path_name = time().$file->getClientOriginalName();
      $file->move('uploads/', $image_path_name);
      $post->imagen = $image_path_name;
  }

  //subir fichero video
  if($request->hasFile('video')){
      $file = $request->file('video');
      $video_path_name = time().$file->getClientOriginalName();
      $file->move('videos/', $video_path_name);
      $post->video = $video_path_name;
  }

  // mandar mensaje y ridireccionar
  if($post->update()){
      flash('Post actualizado correctamente')->success();
  }else{
      flash('Error al actualizar Post')->danger();
  }
  return redirect()->route('editar', ['id' => $id]);

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post->delete($id)){
            flash('Post eliminado correctamente')->success();
        }else{
            flash('Error al eliminar Post')->danger();
        }
        return redirect()->route('posts', ['id' => $id]);
    }
}
