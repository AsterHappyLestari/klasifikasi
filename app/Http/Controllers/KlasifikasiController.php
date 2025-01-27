<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Hasil;

class KlasifikasiController extends Controller
{
    public function index()
    {
        $hasil = Hasil::all();
        return view('data.klasifikasi', compact('hasil'));
    }

    private function hitungLikelihood($atribut, $nilai, $data)
    {
        $totalData = $data->count();
        $frekuensiAtribut = $data->where($atribut, $nilai)->count();

        return $totalData > 0 ? $frekuensiAtribut / $totalData : 0;
    }

    private function hitungPrior($data)
    {
        $totalData = Data::count();
        $jumlahData = $data->count();

        return $totalData > 0 ? $jumlahData / $totalData : 0;
    }

    private function hitungPosterior($dataPrediksi)
    {
        $posterior = [];
        $kelasArray = ['Mampu', 'Menengah', 'Kurang'];
        $data = Data::all();

        foreach ($kelasArray as $kelas) {
            // Filter data berdasarkan kelas
            $dataKelas = $data->filter(function ($item) use ($kelas) {
                $penghasilan = $item->penghasilan;
                $pengeluaran = $item->pengeluaran;

                if ($kelas == 'Mampu') {
                    return $penghasilan >= 7000000 || ($penghasilan - $pengeluaran >= 2000000);
                } elseif ($kelas == 'Menengah') {
                    return ($penghasilan >= 4000000 && $penghasilan < 7000000) || ($penghasilan - $pengeluaran > 1000000);
                } else {
                    return $penghasilan < 4000000 || ($penghasilan - $pengeluaran < 1000000);
                }
            });

            // Hitung probabilitas prior
            $prior = count($dataKelas) / count($data);

            // Hitung likelihood untuk setiap fitur yang diberikan kelas
            $likelihoodPenghasilan = $this->hitungLikelihood('penghasilan', $dataPrediksi['penghasilan'], $dataKelas);
            $likelihoodPengeluaran = $this->hitungLikelihood('pengeluaran', $dataPrediksi['pengeluaran'], $dataKelas);

            // Gabungkan prior dengan likelihood
            $posterior[$kelas] = $prior * $likelihoodPenghasilan * $likelihoodPengeluaran;
        }

        return $posterior;
    }




    private function prediksiKelas($data)
    {
        $posterior = $this->hitungPosterior($data);
        arsort($posterior); // Urutkan dari yang tertinggi
        return array_key_first($posterior); // Kembalikan kelas dengan probabilitas posterior tertinggi
    }

    public function prediksiSatu(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'tanggungan' => 'required|integer',
            'pekerjaan' => 'required|string',
            'penghasilan' => 'required|numeric',
            'pengeluaran' => 'required|numeric',
            'pendidikan' => 'required|string',
        ]);

        // Simpan data input ke tabel Data
        $data = Data::updateOrCreate(
            ['nama' => $request->nama, 'tanggungan' => $request->tanggungan, 'pekerjaan' => $request->pekerjaan],
            [
                'penghasilan' => $request->penghasilan,
                'pengeluaran' => $request->pengeluaran,
                'pendidikan' => $request->pendidikan
            ]
        );

        // Siapkan data untuk prediksi
        $dataPrediksi = [
            'tanggungan' => $request->tanggungan,
            'pekerjaan' => $request->pekerjaan,
            'penghasilan' => $request->penghasilan,
            'pengeluaran' => $request->pengeluaran,
            'pendidikan' => $request->pendidikan,
        ];

        // Prediksi kelas menggunakan Naive Bayes
        $kelasPrediksi = $this->prediksiKelas($dataPrediksi);

        // Simpan hasil prediksi ke tabel Hasil
        Hasil::updateOrCreate(
            ['data_id' => $data->id_data],  // Kondisi pencarian untuk update atau create
            [
                'nama' => $request->nama,
                'tanggungan' => $request->tanggungan,
                'pekerjaan' => $request->pekerjaan,
                'penghasilan' => $request->penghasilan,
                'pengeluaran' => $request->pengeluaran,
                'pendidikan' => $request->pendidikan,
                'status' => $kelasPrediksi,
            ]
        );

        return redirect()->route('data.klasifikasi')->with('success', 'Data dan hasil prediksi berhasil disimpan.');
    }


    public function prediksiSemua()
    {
        $data = Data::all();

        foreach ($data as $item) {
            $dataPrediksi = [
                'tanggungan' => $item->tanggungan,
                'pekerjaan' => $item->pekerjaan,
                'penghasilan' => $item->penghasilan,
                'pengeluaran' => $item->pengeluaran,
                'pendidikan' => $item->pendidikan,
            ];

            $kelasPrediksi = $this->prediksiKelas($dataPrediksi);

            Hasil::updateOrCreate(
                ['data_id' => $item->id_data],
                [
                    'nama' => $item->nama,
                    'tanggungan' => $item->tanggungan,
                    'pekerjaan' => $item->pekerjaan,
                    'penghasilan' => $item->penghasilan,
                    'pengeluaran' => $item->pengeluaran,
                    'pendidikan' => $item->pendidikan,
                    'status' => $kelasPrediksi
                ]
            );
        }
        return redirect()->route('data.klasifikasi')->with('success', 'Prediksi berhasil dilakukan dan hasil disimpan.');
    }
}
