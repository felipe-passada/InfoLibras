<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use impleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\QrCodeModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class QrCodeFunController extends Controller
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
        return view('funcionario/qrcode');
    }

}    