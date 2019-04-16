<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Gate;
use App\User;

class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!Gate::allows('isAdmin')) {
            abort(404, "Sorry, You can do this actions");
        }

        // $usuario = DB::table('users')->get();

        // $usuario = new User();
        // $usuario->name = "Cesarrr";
        // $usuario->email = "testee@ifsp.com";
        // $usuario->password = "123#123";
        // $usuario->user_type = "admin";
        // $usuario->save();

        return view('admin/usuario');
    }

    public function cadastrar(Request $request){
        $usuario = new User();
        $usuario->name = $request->input('formNome');
        $usuario->email = $request->input('formEmail');
        $usuario->password = bcrypt($request->input('formPassword'));
        $usuario->user_type = $request->input('formUserType');
        $usuario->save();
    }
    
}
