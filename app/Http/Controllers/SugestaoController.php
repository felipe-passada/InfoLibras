<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Sugestion;
use Gate;

class SugestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestions = Sugestion::latest()->paginate(6);
        return view('funcionario.indexsugestao', compact('sugestions'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        return view('funcionario.createsugestao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestion = new Sugestion();
        $sugestion->title = $request->input('title');
        $sugestion->description = $request->input('textareaDescricao');
        $sugestion->user_id = $request->user()->id;
        $sugestion->save();

        // User::create($request->all());
        return redirect()->route('sugestao.index')
            ->with('success', 'Novo sugestão criado com sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestion = Sugestion::find($id);
        return view('funcionario.detail', compact('sugestion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestion = Sugestion::find($id);
        return view('funcionario.edit', compact('sugestion'));
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

        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestion = Sugestion::find($id);
        $sugestion->name = $request->get('');
        $sugestion->email = $request->get('');
        $sugestion->user_type = $request->input('');
        $sugestion->save();
        return redirect()->route('sugestao.index')
            ->with('success', 'O sugestão atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestion = Sugestion::find($id);
        $sugestion->delete();
        return redirect()->route('sugestao.index')
            ->with('success', 'O sugestão excluído com sucesso');
    }
}
