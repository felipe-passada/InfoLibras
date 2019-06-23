<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Sugestion;
use App\Model\Solicitation;
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

        $solicitations = Solicitation::latest()->paginate(6);
        return view('interprete.indexsolicitation', compact('solicitations'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sugestion $sugestion)
    {

        // if (!Gate::allows('isInterprete')) {
        //     abort(404, "Sorry, You can do this actions");
        // }

        $solicitation = new Solicitation();
        $solicitation->description = $sugestion->description;
        $solicitation->sugestion_id = $sugestion->id;
        $solicitation->save();

        return "True";
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

        $solicitation = new Solicitation();
        $solicitation->description = $request->input('textareaDescricao');
        $solicitation->interpreter_id = $request->user()->id;
        $solicitation->sugestion_id = $request->user()->id;
        $solicitation->save();

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

        $solicitacao = Solicitation::find($id);
        return view('interprete.detailsolicitation', compact('solicitacao'));
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

        $solicitation = Solicitation::find($id);
        return view('interprete.solicitation', compact('solicitation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $solicitation = Solicitation::find($id);

        if ($solicitation->status == "waiting") {
            $solicitation->status = "working";

            $video = new VideoController;
            $id = $video->store($solicitation);
            $solicitation->video_id = $id;
            $solicitation->save();

            redirect()->route('solicitacao.index')
            ->with('success', 'Novo video criado com sucesso');
        }


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

        $solicitation = Solicitation::find($id);
        $solicitation->delete();
        return redirect()->route('solicitacao.index')
            ->with('success', 'O solicitação excluído com sucesso');
    }
}