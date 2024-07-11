@extends('welcome')
 
@section('content')
<div class="container" style="padding: 10px;">
    <div class="row mt-2">
        <div class="col-lg-12 pb-3">
             <div class="float-left">
                <h4>Master Log Harian</h4>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('log-harian-pegawai.create') }}"><i class="fas fa-plus"></i> Tambah Log Harian</a>
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
                <table class="table table-hover table-bordered table-sm bg-light table-striped" id="example2">
                    <thead>
                        <tr style="background-color: #6082B6; color:white">
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal Log</th>
                            <th class="text-center">Keterangan Kegiatan</th>
                            <th class="text-center">Status</th>
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
                            <td class="text-center">{{  Carbon\Carbon::parse($p->created_at)->format('d-m-Y H:i:s') }}</td>
                            <td class="text-left">{{  $p->keterangan_log_harian }}</td>
                            <td class="text-center">
                                @if($p->status_log_harian == 'Ditolak')
                                <div><span class="badge badge-danger">Ditolak</span></div>

                                @elseif($p->status_log_harian == 'Pending')
                                <div><span class="badge badge-warning">Pending</span></div>

                                @elseif($p->status_log_harian == 'Diterima')
                                <div><span class="badge badge-success">Diterima</span></div>

                                @endif
                            </td>
                            <td class="text-center">  
                                <a class="btn btn-primary btn-sm" href="{{ route('log-harian-pegawai.show',$p->id) }}"><i class="fas fa-eye"></i></a>                                      
                                <a class="btn btn-info btn-sm" href="{{ route('log-harian-pegawai.edit',$p->id) }}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" href="{{ route('log-harian-pegawai.delete',$p->id) }}"><i class="fas fa-times"></i></a>
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