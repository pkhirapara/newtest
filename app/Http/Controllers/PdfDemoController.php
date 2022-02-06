<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

class PdfDemoController extends Controller
{
    public function index(){
        return view('PdfDemo');
    }

    public function samplePDF(){
        $html_content = '<h1>Generate a PDF using TCPDF in Laravel </h1>
            <h1>Hello World</h1>';

        PDF::SetTitle('Sample PDF');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');

        PDF::Output('SamplePDF.pdf');
    }
}
