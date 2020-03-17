<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Category;
use App\Sub_Category;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/panel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         // mostrar las categorias 
        $categorias = Category::orderBy('id', 'ASC')->paginate(4);
        $_SERVER['categorias'] = $categorias;

        // mostrar las sub_categorias 
        $subcategorias = Sub_Category::orderBy('id', 'ASC')->paginate(3);
        $_SERVER['subcategorias'] = $subcategorias;

        $this->middleware('guest')->except('logout');
    }
}
