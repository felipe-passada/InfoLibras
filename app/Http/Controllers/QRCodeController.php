<?php

namespace App\Http\Controllers;

class QRCodeController extends Controller
{
    public function make()
    {
        $file = public_path('qr.png');
        return \QRCode::text('QR Code Generator for Laravel!')->setOutFile($file)->png();
    }
    public function url()
    {
        $file = public_path('qr.png');
        return  \QRCode::url('ifspguarulhos.edu.br')
        ->setOutFile($file)
        ->setSize(8)
        ->setMargin(2)
        ->png();
    }
}
