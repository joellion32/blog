<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


//rutas para las diferentes paginas
Route::get('/contacto', 'Web\BlogController@contacto')->name('contacto');
Route::get('/sobre', 'Web\BlogController@sobre')->name('sobre');
Route::get('/editorial', 'Web\BlogController@editorial')->name('editorial');

// ruta para los posts
Route::get('/', 'Blog\PostController@index')->name('home');
Route::get('/post/detalle/{slug}', 'Blog\PostController@show')->name('detalle');
Route::get('/crear/post', 'Blog\PostController@create')->name('crear.post')->middleware('auth');

// ruta para los posts administracion
Route::get('/eliminar/post/{id}', 'Blog\PostController@destroy')->middleware('auth');
Route::post('/guardar/post', 'Blog\PostController@store')->name('guardar')->middleware('auth');
Route::get('/editar/post/{id}', 'Blog\PostController@edit')->name('editar')->middleware('auth');
Route::post('/actualizar/posts/{id}', 'Blog\PostController@update')->name('actualizar')->middleware('auth');

// ruta para las categorias
Route::get('/categorias/{slug}', 'Blog\CategoryController@mostrarcategoria');
Route::get('/categoria/crear', 'Blog\CategoryController@create')->name('crear')->middleware('auth');
Route::post('/categoria/guardar', 'Blog\CategoryController@store')->middleware('auth');
Route::get('/categoria/eliminar/{id}', 'Blog\CategoryController@destroy')->middleware('auth');

// ruta para las subcategorias
Route::get('/subcategorias/{slug}', 'Blog\Sub_CategoryController@mostrarsubcategoria');
Route::post('/subcategoria/guardar', 'Blog\Sub_CategoryController@store')->middleware('auth');
Route::get('/subcategoria/eliminar/{id}', 'Blog\Sub_CategoryController@destroy')->middleware('auth');

//rutas para los comentarios
Route::post('/comentarios/guardar', 'Blog\CommentsController@guardarcomentario');
Route::get('/comentario/eliminar/{id}', 'Blog\CommentsController@destroy')->middleware('auth');


// rutas para las notificaciones
Route::get('/notificaciones', 'Blog\NotificacionesController@index')->name('notificaciones')->middleware('auth');
Route::get('/notificaciones/eliminar/{id}', 'Blog\NotificacionesController@eliminar')->middleware('auth');
Route::post('/notificaciones/guardar', 'Blog\NotificacionesController@guardar');

// rutas para el administrador
Route::get('/panel', 'admin\AdminController@panel')->name('panel')->middleware('auth');
Route::get('/posts', 'admin\AdminController@posts')->name('posts')->middleware('auth');
Route::get('/perfil/{id}', 'admin\AdminController@perfil')->name('perfil')->middleware('auth');
Route::post('/actualizar/{id}', 'admin\AdminController@actualizarperfil')->middleware('auth');
Route::get('editar/carrousel', 'admin\AdminController@editarcarrousel')->name('portada')->middleware('auth');


//rutas JSON
Route::get('/carrousel/{id}', 'Blog\CarrouselController@carrousel');
Route::get('/carrousel', 'Blog\CarrouselController@obtenercarrousel');
Route::post('save/carrousel', 'Blog\CarrouselController@savecarrousel');




