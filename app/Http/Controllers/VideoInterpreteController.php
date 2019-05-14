<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Video;
use Gate;

class VideoInterpreteController extends Controller
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

        $videos = Video::latest()->paginate(6);
        return view('interprete.indexvideo', compact('videos'))
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

        return view('interprete.createvideo');
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

        $video = new Video();
        $video->description = $request->input('textareaDescricao');
        $video->interpreter_id = $request->user()->id;
        $video->sugestion_id = $request->user()->id;
        $video->save();

        // User::create($request->all());
        return redirect()->route('videos.index')
            ->with('success', 'Novo video criado com sucesso');
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

        $video = Video::find($id);
        return view('interprete.detail', compact('videos'));
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

        $video = Video::find($id);
        return view('interprete.edit', compact('videos'));
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

        $video = Video::find($id);
        $video->name = $request->get('');
        $video->email = $request->get('');
        $video->user_type = $request->input('');
        $video->save();
        return redirect()->route('videos.index')
            ->with('success', 'O video atualizado com sucesso');
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

        $video = Video::find($id);
        $video->delete();
        return redirect()->route('videos.index')
            ->with('success', 'O video excluído com sucesso');
    }
}

