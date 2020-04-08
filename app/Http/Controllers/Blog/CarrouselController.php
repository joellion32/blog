<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Carrousel;
use App\Carrousel2;

class CarrouselController extends Controller
{
      public function carrousel($id){
          // para enviar al carrousel
          $carrousel = Post::find($id);
          return response()->json($carrousel);
    }

    // para guardar contenido del carrousel 1 
    public function savecarrousel(Request $request){
        $carrousel = new Carrousel();
        $carrousel->titulo = $request->titulo;
        $carrousel->imagen = $request->imagen;
        $carrousel->save();
        echo "carrousel guardado correctamente";
    }

     // para guardar contenido del carrousel 2 
     public function savecarrousel2(Request $request){
        $carrousel = new Carrousel2();
        $carrousel->titulo = $request->titulo;
        $carrousel->imagen = $request->imagen;
        $carrousel->save();
        echo "carrousel guardado correctamente";
    }

    public function obtenercarrousel(){
        // para enviar al carrousel
        $carrousel = Carrousel::orderBy('id', 'DESC')->paginate(1);
        return response()->json($carrousel);
  }

  
  public function obtenercarrousel2(){
    // para enviar al carrousel 2
    $carrousel = Carrousel2::orderBy('id', 'DESC')->paginate(1);
    return response()->json($carrousel);
}

}
