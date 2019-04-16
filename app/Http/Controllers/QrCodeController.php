<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use impleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\QrCodeModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Gate;

class QrCodeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!Gate::allows('isServidor')) {
            abort(404, "Sorry, You can do this actions");
        }

        return view('funcionario/qrcode');
    }


    // public function __construct(QrcodeModel $qrcodeModel) {
    //     $this->model = $qrcodeModel;
    // }

    // public function getAll() {
    //     $qrcodeModel = $this->model->all();
    //     return response()->json($qrcodeModel);
    // }

    // public function get($id) {
    //     $qrcodeModel = $this->model->find($id);
    //     return response()->json($qrcodeModel);
    // }

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
