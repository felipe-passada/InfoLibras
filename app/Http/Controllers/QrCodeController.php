<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Str;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Model\QrCodeModel;
use Illuminate\Support\Facades\Storage;



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
    public function create()
    {

        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        return view('funcionario.createqrcode');
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

        // $qrcode = new Qrcode();
        // $qrcode->title = $request->input('formTitulo');
        // $qrcode->content = $request->input('formConteudo');
        // $qrcode->description = $request->input('textareaDescricao');
        // $qrcode->save();

        $data = [
            'title' => $title = $request->input('formTitulo'),
            'content' => $content = $request->input('formConteudo'),
            'path' => $path = public_path('storage/qrcode/' . Str::snake($title) . '.svg'),
            'description' => $description = $request->input('textareaDescricao'),
            'video' => $video = $request->user()->id,
            'servidor_id' => $servidor_id = $request->user()->id
        
        ];

        $qrcode = \QrCode::generate($content);
        Storage::disk('local')->put(Str::snake($title) . '.svg', $qrcode);

        $qrcodeModel = $this->model->create($data);
        return response()->json($qrcodeModel);

        // User::create($request->all());
        return redirect()->route('qrcode.index')
            ->with('success', 'Novo Qq code criado com sucesso');
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

        $qrcode = Qrcode::find($id);
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

        $qrcode = Qrcode::find($id);
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

        $qrcode = Qrcode::find($id);
        $qrcode->title = $request->input('formTitulo');
        $qrcode->content = $request->input('formConteudo');
        $qrcode->description = $request->input('textareaDescricao');
        
        $qrcode->save();
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

        $qrcode = Qrcode::find($id);
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



