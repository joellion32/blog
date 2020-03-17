<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Sub_Category;

class BlogController extends Controller
{
    public function contacto(){
        // mostrar las categorias 
        $categorias = Category::orderBy('id', 'ASC')->paginate(5);
        $_SERVER['categorias'] = $categorias;

        // mostrar las sub_categorias 
        $subcategorias = Sub_Category::orderBy('id', 'ASC')->paginate(3);
        $_SERVER['subcategorias'] = $subcategorias;
        
        return view('pages.contacto');
    }

    public function sobre(){
         // mostrar las categorias 
        $categorias = Category::orderBy('id', 'ASC')->paginate(5);
        $_SERVER['categorias'] = $categorias;

        // mostrar las sub_categorias 
        $subcategorias = Sub_Category::orderBy('id', 'ASC')->paginate(3);
        $_SERVER['subcategorias'] = $subcategorias;
        
        return view('pages.about');
    }
}
