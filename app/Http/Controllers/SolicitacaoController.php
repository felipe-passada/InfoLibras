<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class SolicitacaoController extends Controller
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
        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        return view('funcionario/solicitacao');
    }
}
