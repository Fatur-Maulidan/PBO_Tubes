<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __invoke()
    {

        $transaksi = Transaksi::whereNotNull('tanggalPengembalian')->get();
        
        $fileName = 'Rekap.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 20,
            'margin_top' => 25,
            'margin_bottom' => 25
        ]);

        $html = view('report', ['transaksi' => $transaksi])->render();
        $mpdf->SetHeader('Pemrograman Berorientasi Objek');
        $mpdf->SetFooter('Laravel Report');
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');
    }
}