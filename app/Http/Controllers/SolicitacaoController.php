<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Information;
use Gate;

class SolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('isInterprete')) {
            abort(404, "Sorry, You can do this actions");
        }

        $informations = Information::latest()->paginate(6);
        return view('interprete.indexinformacoes', compact('informations'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Gate::allows('isInterprete')) {
            abort(404, "Sorry, You can do this actions");
        }

        return view('interprete.createinformacoes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('isInterprete')) {
            abort(404, "Sorry, You can do this actions");
        }

        $information = new Information();
        $information->description = $request->input('textareaDescricao');
        $information->interpreter_id = $request->user()->id;
        $information->sugestion_id = $request->user()->id;
        $information->save();

        // User::create($request->all());
        return redirect()->route('solicitacao.index')
            ->with('success', 'Novo solicitação criado com sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('isInterprete')) {
            abort(404, "Sorry, You can do this actions");
        }

        $information = Information::find($id);
        return view('interprete.detail', compact('sugestion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('isInterprete')) {
            abort(404, "Sorry, You can do this actions");
        }

        $information = Information::find($id);
        return view('interprete.edit', compact('sugestion'));
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

        if (!Gate::allows('isInterprete')) {
            abort(404, "Sorry, You can do this actions");
        }

        $information = Information::find($id);
        $information->name = $request->get('');
        $information->email = $request->get('');
        $information->user_type = $request->input('');
        $information->save();
        return redirect()->route('solicitacao.index')
            ->with('success', 'O solicitação atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('isInterprete')) {
            abort(404, "Sorry, You can do this actions");
        }

        $information = Information::find($id);
        $information->delete();
        return redirect()->route('solicitacao.index')
            ->with('success', 'O solicitação excluído com sucesso');
    }
}

