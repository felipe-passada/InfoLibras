<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Gate;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }

        $usuarios = User::latest()->paginate(6);
        return view('admin.index', compact('usuarios'))
                  ->with('i', (request()->input('page',1) -1)*6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $usuario = $request->validate([
        //     'formNome' => 'required|string|max:255',
        //     'formEmail' => 'required|string|email|max:255',
        //     'formPassword' => 'required|string|min:6|confirmed',
        //     'formUserType' => 'required',
        // ]);

        $usuario = new User();
        $usuario->name = $request->input('formNome');
        $usuario->email = $request->input('formEmail');
        $usuario->password = bcrypt($request->input('formPassword'));
        $usuario->user_type = $request->input('formUserType');
        $usuario->save();

        // User::create($request->all());
        return redirect()->route('admin.index')
                        ->with('success', 'Novo usuário criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return view('admin.detail', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        return view('admin.edit', compact('usuario'));
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

      $usuario = User::find($id);
      $usuario->name = $request->get('formName');
      $usuario->email = $request->get('formEmail');
      $usuario->user_type = $request->input('formUserType');
      $usuario->save();
      return redirect()->route('admin.index')
                      ->with('success', 'O usuário atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('admin.index')
                        ->with('success', 'O usuário excluído com sucesso');
    }
}
