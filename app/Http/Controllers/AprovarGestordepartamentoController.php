<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Sugestion;
use Gate;

class AprovarGestordepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('isGestordepartemento')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestions = Sugestion::latest()->paginate(6);
        return view('gestordepartamento.indexaprovar', compact('sugestions'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Gate::allows('isGestordepartemento')) {
            abort(404, "Sorry, You can do this actions");
        }

        return view('gestordepartamento.createaprovar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('isGestordepartemento')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestion = new Sugestion();
        $sugestion->description = $request->input('textareaDescricao');
        $sugestion->user_id = $request->user()->id;
        $sugestion->save();

        // User::create($request->all());
        return redirect()->route('aprovar.index')
            ->with('success', 'Novo aprovar criado com sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('isGestordepartemento')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestion = Sugestion::find($id);
        return view('gestordepartamento.detailaprovar', compact('sugestion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('isGestordepartemento')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestion = Sugestion::find($id);
        return view('gestordepartamento.editaprovar', compact('sugestion'));
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

        if (!Gate::allows('isGestordepartemento')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestion = Sugestion::find($id);
        $sugestion->status = $request->input('formStatus');
        $sugestion->save();
        return redirect()->route('aprovar.index')
            ->with('success', 'O aprovar atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('isGestordepartemento')) {
            abort(404, "Sorry, You can do this actions");
        }

        $sugestion = Sugestion::find($id);
        $sugestion->delete();
        return redirect()->route('aprovar.index')
            ->with('success', 'O aprovar excluído com sucesso');
    }
}
