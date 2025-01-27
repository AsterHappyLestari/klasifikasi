@extends('master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <h4 class="card-title">Laporan Hasil Klasifikasi Menggunakan Algoritma Naive Bayes</h4>
                </div>
            </div>

            <div class="card-body">
                <div class="container">
                    <h2>Tampilkan Tingkat Ekonomi: {{ $status ? ucfirst($status) : 'Semua Data' }}</h2>

                    <form action="{{ route('report.index') }}" method="GET" class="mb-3">
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="">Semua Klasifikasi</option>
                            <option value="Mampu" {{ $status == 'Mampu' ? 'selected' : '' }}>Mampu</option>
                            <option value="Menengah" {{ $status == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                            <option value="Kurang" {{ $status == 'Kurang' ? 'selected' : '' }}>Kurang</option>
                        </select>
                    </form>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Tanggungan</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>Pengeluaran</th>
                                <th>Pendidikan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $item)
                                <tr>
                                    <td>{{ $item->data_id }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tanggungan }}</td>
                                    <td>{{ $item->pekerjaan }}</td>
                                    <td>{{ $item->penghasilan }}</td>
                                    <td>{{ $item->pengeluaran }}</td>
                                    <td>{{ $item->pendidikan }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data yang ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <a href="{{ route('report.download', ['status' => $status]) }}" class="btn btn-primary">Unduh PDF</a>
                </div>
            </div>
        </div>
    @endsection
