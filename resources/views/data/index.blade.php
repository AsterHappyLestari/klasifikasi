@extends('master')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="col-12">
    <div class="card">
        <div class="card-header">
			<div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <h4 class="card-title">Input Data</h4>
			</div>
        </div>



        <div class="card-body">
        
        <p class="text-info">Masukkan data ke tabel sesuai file excel yang sudah disediakan, upload dalam format .csv, dan gunakan delimiter ';' pada file tersebut !</p>
        <a href="{{ route('data.format', ['filename' => 'nama_file.xlsx']) }}">Download Format Tabel Disini.</a>  
            <div class="form-group">
                <div class="custom-file">
                    <form method="POST" action="{{ route('data.import') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <input type="file" name="csv_file" accept=".csv" class="custom-file-input">
                            <label class="custom-file-label">Choose file .csv</label>
                        </div>  
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn light btn-rounded btn-info">
                            <span class="btn-icon-left text-primary"><i class="fa fa-upload color-success"></i>
                            </span>Upload</button>
                        </div>
                           
                    </form>
                </div>     
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">
                <h4 class="card-title">List Data</h4>
                    <div class="row">
                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                <a href="#" class="btn light btn-rounded btn-primary">
                                <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                        </span>Tambah</a>
                        </div> -->
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
                            <th scope="col">Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->tanggungan }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>{{ $item->penghasilan }}</td>
                            <td>{{ $item->pengeluaran }}</td>
                            <td>{{ $item->pendidikan }}</td>

                            <td class="text-left">
                                <div class="ml-auto">
                                    <a href="#" class="btn btn-primary btn-xs sharp mr-1" data-toggle="modal" data-target="#editModal{{ $item->id_data }}"><i class="fa fa-pencil"></i></a>      
                                    <form action="{{ route('data.destroy', ['id_data' => $item->id_data]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i>Hapus</button>
                                    </form>  
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $item->id_data }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form untuk mengedit data -->
                                        <form action="{{ route('data.update', $item->id_data) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggungan">Tanggungan</label>
                                                <input type="number" class="form-control" id="tanggungan" name="tanggungan" value="{{ $item->tanggungan }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $item->pekerjaan }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="penghasilan">Penghasilan</label>
                                                <input type="number" class="form-control" id="penghasilan" name="penghasilan" value="{{ $item->penghasilan }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="pengeluaran">Pengeluaran</label>
                                                <input type="number" class="form-control" id="pengeluaran" name="pengeluaran" value="{{ $item->pengeluaran }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="pendidikan">Pendidikan</label>
                                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{ $item->pendidikan }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

@endsection