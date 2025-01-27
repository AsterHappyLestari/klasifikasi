@extends('master')
@section('content')


<div class="col-12">
    <div class="card">
        <div class="card-header">
                <h4 class="card-title">Klasifikasi Data</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('data.prediksi') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggungan</label>
                            <input type="number" name="tanggungan" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Penghasilan</label>
                            <input type="number" name="penghasilan" class="form-control" placeholder="Rp." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pengeluaran</label>
                            <input type="number" name="pengeluaran" class="form-control" placeholder="Rp." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pendidikan</label>
                            <input type="text" name="pendidikan" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <div class="form-group">
                            <button type="submit" class="btn tp-btn-info btn-info">Hitung Klasifikasi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">
                <h4 class="card-title">Hasil Klasifikasi</h4>
                <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        
                        <form action="{{ route('data.prediksiSemua') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn tp-btn-info btn-info">Klasifikasi Semua Data</button>
                        </form>
                        
                        </div>
                    </div> 
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered verticle-middle table-responsive-sm data-tables">
                    <thead class="thead-info">
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggungan</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Penghasilan</th>
                            <th scope="col">Pengeluaran</th>
                            <th scope="col">Pendidikan</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hasil as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tanggungan }}</td>
                                <td>{{ $item->pekerjaan }}</td>
                                <td>{{ $item->penghasilan }}</td>
                                <td>{{ $item->pengeluaran }}</td>
                                <td>{{ $item->pendidikan }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    
</div>



@endsection