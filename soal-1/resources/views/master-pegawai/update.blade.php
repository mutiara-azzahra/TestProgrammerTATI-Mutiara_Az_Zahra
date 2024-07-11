@extends('welcome')
 
@section('content')
<div class="container" style="padding: 10px;">
    <div class="row mt-2">
        <div class="col-lg-12 pb-3">
             <div class="float-left">
                <h4>Ubah Master Role</h4>
            </div>
            <div class="float-right">
                    <a class="btn btn-success" href="{{ route('master-pegawai.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="myAlert">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('danger'))
        <div class="alert alert-warning" id="myAlert">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card" style="padding: 10px;">
        <div class="card-body">
            <div class="col-lg-12">
                <form action="{{ route('master-pegawai.store') }}" method="POST">
                @csrf
                <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                            <strong>Akun Pegawai</strong>
                            <input type="text" name="username" class="form-control" value="{{ $pegawai->user->username }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nama</strong>
                            <input type="text" name="nama_pegawai" class="form-control" value="{{ $pegawai->nama_pegawai }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <strong>Level Pegawai</strong>
                            <select name="id_level_pegawai" class="form-control my-select-2" >
                                <option value="">---Pilih Level Pegawai--</option>
                                @foreach($level_pegawai as $a)
                                    <option value="{{ $a->id }}" {{ old('kategori_level') == $a->kategori_level ? 'selected' : '' }}>
                                        {{ $a->kategori_level }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <strong>Atasan Pegawai</strong>
                            <select name="id_atasan_pegawai" class="form-control my-select-3" >
                                <option value="">---Pilih Atasan Pegawai--</option>
                                @foreach($atasan_pegawai as $a)
                                    <option value="{{ $a->id }}" {{ old('nama_pegawai') == $a->nama_pegawai ? 'selected' : '' }}>
                                        {{ $a->nama_pegawai }} - {{ $a->level_pegawai->kategori_level }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <div class="float-right">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>                            
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')

@endsection