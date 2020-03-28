<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Sub_Category;
use App\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrarcategoria($slug)
    {
         // mostrar las categorias 
         $categorias = Category::orderBy('id', 'ASC')->paginate(4);
         $_SERVER['categorias'] = $categorias;
         
         // mostrar las sub_categorias 
         $subcategorias = Sub_Category::orderBy('id', 'ASC')->paginate(3);
         $_SERVER['subcategorias'] = $subcategorias;
         
         // mostrar primera categoria
      $primera_categoria = Category::orderBy('id', 'ASC')->first();
      $_SERVER['primera'] = $primera_categoria->nombre_categoria;

         
         // mostrar las secciones 
        $secciones = Category::orderBy('id', 'DESC')->get();
         

        $id = Category::where('slug', $slug)->pluck('id')->first();
        $posts = Post::orderBy('id', 'DESC')->where('categoria_id', '=', $id)->paginate(8);

        //para el nombre de la categoria
        $categoria = Category::find($id);

        // post reciente 
        $reciente = Post::orderBy('id', 'DESC')->paginate(1);
        $recientes = Post::orderBy('id', 'DESC')->paginate(3);


        return view('categorias.index', compact('categoria', 'posts', 'reciente', 'recientes', 'secciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('categorias.crear_categoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Category();
        $categoria->slug = $request->input('categoria');
        $categoria->nombre_categoria = $request->input('categoria');

        if($categoria->save()){
            flash('Categoria creada correctamente')->success();
        }else{
            flash('Error al crear categoria')->danger();
        }
        return redirect()->route('crear');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Category::find($id);
    
        if($categoria->delete($id)){
            flash('Categoria eliminada correctamente')->success();
        }else{
            flash('Error al eliminar categoria')->danger();
        }
        return redirect()->route('panel');
    }
}
