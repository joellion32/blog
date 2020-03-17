<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $table = "sub_categorias";


    public function posts()
   {
       return $this->hasMany('App\Post', 'sub_categoria_id');
   }
}
