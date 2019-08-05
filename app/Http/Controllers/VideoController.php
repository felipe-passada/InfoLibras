<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Video;
use App\Model\Solicitation;
use Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::latest()->paginate(6);
        return view('videos.index', compact('videos'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $video->titulo = $request->input('title');
        $video->video = $request->input('link');

        if ($request->has('img')) {
            $video->thumbnail = $request->file('img')->store('thumbnail', 'public');
        }

        $video->save();
        $solicitation = new SolicitacaoController();
        $solicitation->update($video, $request->input('solicitation'));


        return redirect()->route('home')
            ->with('success', 'O video atualizado com sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if (!Gate::allows('isInterprete') && !Gate::allows('isServidor')) {
        //     abort(404, "Sorry, You can do this actions");
        // }

        $videos = Video::find($id);
        return view('videos.details', compact('videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        $video = Video::find($id);
        return view('videos.details', compact('videos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $video = Video::find($id);
        $video->video = $request->get('link');
        $video->audio_visual_id = $request->user()->id;

        if ($video->staus == "waiting")  {
            $video->status = "working";
        }
        
        $video->save();

        return redirect()->route('videos.index')
            ->with('success', 'O video foi atualizado com sucesso');
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
