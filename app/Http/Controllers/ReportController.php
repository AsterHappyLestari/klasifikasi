<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Hasil;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $data = Hasil::where('status', $status)->get();
        } else {
            $data = Hasil::all();
        }

        return view('report.index', compact('data', 'status'));
    }

    public function downloadPdf(Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $data = Hasil::where('status', $status)->get();
        } else {
            $data = Hasil::all();
        }

        $pdf = PDF::loadView('report.pdf', compact('data', 'status'));
        return $pdf->stream('report.pdf');
    }
}
