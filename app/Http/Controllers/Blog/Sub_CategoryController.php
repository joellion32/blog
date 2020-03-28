<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sub_Category;
use App\Category;
use App\Post;

class Sub_CategoryController extends Controller
{

    public function mostrarsubcategoria($slug)
    {
         // mostrar las categorias 
         $categorias = Category::orderBy('id', 'ASC')->paginate(4);
         $_SERVER['categorias'] = $categorias;
         
         // mostrar las sub_categorias 
         $subcategorias = Sub_Category::orderBy('id', 'ASC')->paginate(3);
         $_SERVER['subcategorias'] = $subcategorias;
         
         // mostrar las secciones 
        $secciones = Category::orderBy('id', 'DESC')->get();

        $id = Sub_Category::where('slug', $slug)->pluck('id')->first();
        $posts = Post::orderBy('id', 'DESC')->where('sub_categoria_id', '=', $id)->paginate(8);

        //para el nombre de la categoria
        $subcategoria = Sub_Category::find($id);

        // post reciente 
        $reciente = Post::orderBy('id', 'DESC')->paginate(1);
        $recientes = Post::orderBy('id', 'DESC')->paginate(3);


        return view('subcategorias.index', compact('subcategoria', 'posts', 'reciente', 'recientes', 'secciones'));
    }


    public function store(Request $request)
    {
        $subcategoria = new Sub_Category();
        $subcategoria->slug = $request->input('subcategoria');
        $subcategoria->sub_categoria = $request->input('subcategoria');

        if($subcategoria->save()){
            flash('Subcategoria creada correctamente')->success();
        }else{
            flash('Error al crear Subcategoria')->danger();
        }
        return redirect()->route('crear');
    }


    public function destroy($id)
    {
        $subcategoria = Sub_Category::find($id);
    
        if($subcategoria->delete($id)){
            flash('Subcategoria eliminada correctamente')->success();
        }else{
            flash('Error al eliminar Subcategoria')->danger();
        }
        return redirect()->route('panel');
    }
}
