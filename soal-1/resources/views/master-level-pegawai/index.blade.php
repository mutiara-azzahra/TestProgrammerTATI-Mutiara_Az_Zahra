@extends('welcome')
 
@section('content')
<div class="container" style="padding: 10px;">
    <div class="row mt-2">
        <div class="col-lg-12 pb-3">
             <div class="float-left">
                <h4>Master Level Pegawai</h4>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('master-level-pegawai.create') }}"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="myAlert">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('warning'))
        <div class="alert alert-warning" id="myAlert">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('danger'))
        <div class="alert alert-danger" id="myAlert">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card" style="padding: 10px;">
        <div class="card-body">
            <div class="col-lg-12">  
                <table class="table table-hover table-bordered table-sm bg-light table-striped" id="example2">
                    <thead>
                        <tr style="background-color: #6082B6; color:white">
                            <th class="text-center">No</th>
                            <th class="text-center">Level Pegawai</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp

                        @foreach($log_harian as $p)
                        <tr>
                            <td class="text-center">{{ $no++ }}.</td>
                            <td class="text-left">{{ $p->kategori_level }}</td>
                            <td class="text-center">                                        
                                <a class="btn btn-info btn-sm" href="{{ route('master-level-pegawai.edit',$p->id) }}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" href="{{ route('master-level-pegawai.delete',$p->id) }}"><i class="fas fa-times-circle"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection