<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmptyExportWithHeader;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Data;
use App\Models\Hasil;

class DataController extends Controller
{
   
    public function showImportForm()
    {
        return view('data.index');
    }

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $path = $request->file('csv_file')->getRealPath();
        $file = fopen($path, 'r');

        while (($data = fgetcsv($file, 1000, ';')) !== false) {
           
            $rowData = [
                'nama' => $data[0],
                'tanggungan' => $data[1],
                'pekerjaan' => $data[2],
                'penghasilan' => $data[3],
                'pengeluaran' => $data[4],
                'pendidikan' => $data[5]
            ];

            DB::table('tb_data')->insert($rowData);
        }
        fclose($file);

        return redirect()->back()->with('success', 'CSV imported successfully.');
      
    }

    public function showForm()
    {
        $data = Data::all();
        return view('data.index', compact('data'));
    }

    public function edit($id_data)
    {
        $data = Data::findOrFail($id_data);
        return view('data.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'tanggungan' => 'required|integer',
            'pekerjaan' => 'required|string',
            'penghasilan' => 'required|numeric',
            'pengeluaran' => 'required|numeric',
            'pendidikan' => 'required|string',
        ]);

        // Update data di tb_data
        $data = Data::findOrFail($id);
        $data->nama = $request->nama;
        $data->tanggungan = $request->tanggungan;
        $data->pekerjaan = $request->pekerjaan;
        $data->penghasilan = $request->penghasilan;
        $data->pengeluaran = $request->pengeluaran;
        $data->pendidikan = $request->pendidikan;
        $data->save();

        // Update data di tb_hasil
        $hasil = Hasil::where('data_id', $data->id_data)->first();
        if ($hasil) {
            $hasil->nama = $request->nama;
            $hasil->tanggungan = $request->tanggungan;
            $hasil->pekerjaan = $request->pekerjaan;
            $hasil->penghasilan = $request->penghasilan;
            $hasil->pengeluaran = $request->pengeluaran;
            $hasil->pendidikan = $request->pendidikan;
            $hasil->save();
        }

        return redirect()->route('data.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id_data)
    {
        $data = Data::findOrFail($id_data);

        if ($data->hasil) {
            $data->hasil()->delete();
        }

        $data->delete();

        return redirect()->route('data.index')->with('success', 'Data berhasil dihapus');
    }


    public function download($filename) {
        $filePath = public_path("upload/format.xlsx");
        $headers = ['Content-Type: application/xlsx'];
        $fileName = time().'.xlsx';

        return response()->download($filePath, $fileName, $headers);
    }
}
