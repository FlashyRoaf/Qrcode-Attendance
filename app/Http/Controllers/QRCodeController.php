<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    //
    public function index() {
        $qrName = 'qr_'. date( 'd-m-y-G' ,time()) . '.svg'; 
        $path = public_path("qrcodes/" . $qrName);
        QrCode::format('svg')->size(400)->generate(route('scanned'), $path);

        return Inertia::render('QRCodeAttendance', [
            'qrcode' => asset('qrcodes/' . $qrName),
        ]);
    }

    public function create() {
        $qrName = 'qr'. date('d-m-y-G', time()) . '.svg';
        $path = public_path('qrcodes/'. $qrName);
        QrCode::format('svg')->size(400)->generate(route('scanned'), $path);
    }
}
