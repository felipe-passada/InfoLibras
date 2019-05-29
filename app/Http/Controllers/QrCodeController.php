<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Storage;
use App\Model\QrCodeModel;
use App\Model\Video;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;

class QrCodeController extends Controller
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

        $qrcodes = QrCodeModel::latest()->paginate(6);
        return view('funcionario.indexqrcode', compact('qrcodes'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Video $video)
    {

        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        $videos =  DB::table('videos')->get();
        return view('funcionario.createqrcode', compact('videos'));
    }

    public function __construct(QrcodeModel $qrcodeModel)
    {
        $this->model = $qrcodeModel;
    }

    public function getAll()
    {
        $qrcodeModel = $this->model->all();
        return response()->json($qrcodeModel);
    }

    public function get($id)
    {
        $qrcodeModel = $this->model->find($id);
        return response()->json($qrcodeModel);
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

        $qrcodeModel = new QrCodeModel();
        $qrcodeModel->title = $request->input('formTitulo');
        $qrcodeModel->description = $request->input('textareaDescricao');

        if($request->input('video')) {
            $video = Video::find($request->input('video'));
            $qrcodeModel->content = $video->video;
            $qrcodeModel->video = $video->id;
        }
        
        $qrcodeModel->path = \QrCode::format('png')->generate($qrcodeModel->content, storage_path('app/public/qrcode.png'));
        $qrcodeModel->servidor_id = $request->user()->id;
        $qrcodeModel->save();

        return redirect()->route('qrcode.index')
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
        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        $qrcode = QrCodeModel::find($id);
        return view('funcionario.detailqrcode', compact('qrcode'));
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

        $qrcode = QrCodeModel::find($id);
        return view('funcionario.editqrcode', compact( 'qrcode'));
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

        $qrcodeModel = QrCodeModel::find($id);
        $qrcodeModel->title = $request->input('formTitulo');
        $qrcodeModel->description = $request->input('textareaDescricao');

        $qrcodeModel->content = $request->input('formConteudo');

        $qrcodeModel->path = \QrCode::format('png')->generate($qrcodeModel->content, storage_path('app/public/qrcode.png'));
        $qrcodeModel->servidor_id = $request->user()->id;
        $qrcodeModel->save();
        
       
        return redirect()->route('qrcode.index')
            ->with('success', 'O qrcode atualizado com sucesso');
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

        $qrcode = QrCodeModel::find($id);
        $qrcode->delete();
        return redirect()->route('qrcode.index')
            ->with('success', 'O qrcode excluído com sucesso');
    }

    

    // public function store(Request $request) {
    //     $data = [
    //         'title' => $title = $request->input('title'),
    //         'content' => $content = $request->input('content'),
    //         'path' => $path = public_path('storage/qrcode/'. Str::snake($title) . '.svg'),
    //         'description' => $description = $request->input('description')
    //     ];

    //     $qrcode = \QrCode::generate($content);
    //     Storage::disk('local')->put(Str::snake($title) . '.svg', $qrcode);

    //     $qrcodeModel = $this->model->create($data);
    //     return response()->json($qrcodeModel);
    // }

    // public function update($id, Request $request) {
    //     $qrcodeModel = $this->model->find($id)
    //         ->update($request->all());
    //     return response()->json($qrcodeModel);
    // }

    // public function destroy($id) {
    //     $qrcodeModel = $this->model->find($id)
    //         ->delete();
    //     return response()->json($qrcodeModel);
    // }

}



