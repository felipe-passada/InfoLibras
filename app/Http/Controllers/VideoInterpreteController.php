<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Video;
use App\Model\Solicitation;
use Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

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
    public function create(Solicitation $solitation)
    {

        if (!Gate::allows('isInterprete')) {
            abort(404, "Sorry, You can do this actions");
        }
        $video = new Video();
        $video->solicitation_id = $solicitation->id;
        $solicitation->save();

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
        $video->titulo = $request->input('titulo');
        $video->video = $request->input('video');
        if($request->has('img')){
            $video->thumbnail = $request->file('img')->store('thumbnail', 'public');
        }
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
    public function show()
    {
        // if (!Gate::allows('isInterprete') && !Gate::allows('isServidor')) {
        //     abort(404, "Sorry, You can do this actions");
        // }

        $videos = Video::latest()->paginate(6);
        return view('funcionario.traducoes', compact('videos'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
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

