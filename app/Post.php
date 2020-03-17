<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "post";

    public function category()
    {
        return $this->belongsTo('App\Category', 'categoria_id');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Sub_Category', 'sub_categoria_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'usuario_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }

     // funcion para buscar un post
     public function scopeSearch($query , $name){
        return $query->where('titulo' , 'LIKE' , "%$name%");
    }

}
